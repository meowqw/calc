<?php

namespace App\Admin\Controllers;

use App\Models\Coefficient\Coefficient;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CoefficientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Коэффициенты';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Coefficient());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Наименование'))->sortable();
        $grid->column('value', __('Значение'))->sortable();
        $grid->column('start_price', __('Начальная цена'))->sortable();

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
        $show = new Show(Coefficient::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Наименование'));
        $show->field('value', __('Значение'));
        $show->field('start_price', __('Начальная цена'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Coefficient());

        $form->display('id', __('ID'));
        $form->text('name', __('Наименование'));
        $form->text('value', __('Значение'));
        $form->text('start_price', __('Начальная цена'));

        return $form;
    }
}
