<?php

namespace App\Admin\Controllers;

use App\Models\Material\Material;
use App\Models\Settings\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SettingsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Настройки';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Settings());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('start_price', __('Начальная цена'))->sortable();
        $grid->column('logistic_price', __('Логистика'))->sortable();

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
        $show = new Show(Settings::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('start_price', __('Начальная цена'));
        $show->field('logistic_price', __('Логистика'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Settings());

        $form->display('id', __('ID'));
        $form->number('start_price', __('Начальная цена'));
        $form->number('logistic_price', __('Логистика'));

        $form->saving(function (Form $form) {});

        return $form;
    }
}
