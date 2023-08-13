<?php

namespace App\Admin\Controllers;

use App\Models\Material\Material;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MaterialController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Материалы';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Material());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Наименование'))->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id): Show
    {
        $show = new Show(Material::findOrFail($id));

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
        $form = new Form(new Material());

        $form->display('id', __('ID'));
        $form->text('name', __('Наименование'));

        $form->saving(function (Form $form) {});

        return $form;
    }
}
