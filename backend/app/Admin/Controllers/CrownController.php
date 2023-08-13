<?php

namespace App\Admin\Controllers;

use App\Models\Crown\Crown;
use App\Models\Material\Material;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrownController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Коронки';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Crown());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Наименование'))->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail(int $id): Show
    {
        $show = new Show(Crown::query()->findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Наименование'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Crown());

        $form->display('id', __('ID'));
        $form->text('name', __('Наименование'));

        $materials = Material::all();

        foreach ($materials as $index => $material) {
            $form->text("materials.{$index}.pivot.cost", "Цена для {$material->getName()}");
        }

        return $form;
    }

    public function update($id): Response|RedirectResponse
    {
        /** @var Crown $crown */
        $crown = Crown::query()->findOrFail($id);
        $crown->setName(request('name'));
        $crown->save();

        $selectedMaterials = request('materials', []);

        foreach ($selectedMaterials as $materialId => $materialData) {
            $cost = $materialData['pivot']['cost'];

            $crown->materials()->syncWithoutDetaching([$materialId + 1 => ['cost' => $cost]]);
        }

        admin_toastr(trans('admin.update_succeeded'));

        return redirect()->back();
    }

    public function store()
    {
        $crown = new Crown();
        $crown->setName(request('name'));
        $crown->save();

        $selectedMaterials = request('materials', []);

        foreach ($selectedMaterials as $materialId => $materialData) {
            $cost = $materialData['pivot']['cost'];

            $crown->materials()->syncWithoutDetaching([$materialId + 1 => ['cost' => $cost]]);
        }

        admin_toastr(trans('admin.save_succeeded'));

        return redirect()->route('admin.crowns');

    }
}
