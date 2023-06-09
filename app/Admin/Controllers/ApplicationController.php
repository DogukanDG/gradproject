<?php

namespace App\Admin\Controllers;

use App\Models\Applications;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApplicationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Applications';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Applications());

        $grid->column('id', __('Id'));
        $grid->column('sender_id', __('Sender id'));
        $grid->column('receiver_id', __('Receiver id'));
        $grid->column('sender_email', __('Sender email'));
        $grid->column('receiver_email', __('Receiver email'));
        $grid->column('receiver_listing_id', __('Receiver listing id'));
        $grid->column('is_active', __('Is active'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('description', __('Description'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Applications::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('sender_id', __('Sender id'));
        $show->field('receiver_id', __('Receiver id'));
        $show->field('sender_email', __('Sender email'));
        $show->field('receiver_email', __('Receiver email'));
        $show->field('receiver_listing_id', __('Receiver listing id'));
        $show->field('is_active', __('Is active'));
        $show->field('phone_number', __('Phone number'));
        $show->field('description', __('Description'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Applications());

        $form->number('sender_id', __('Sender id'));
        $form->number('receiver_id', __('Receiver id'));
        $form->text('sender_email', __('Sender email'));
        $form->text('receiver_email', __('Receiver email'));
        $form->text('receiver_listing_id', __('Receiver listing id'));
        $form->switch('is_active', __('Is active'))->default(1);
        $form->text('phone_number', __('Phone number'));
        $form->textarea('description', __('Description'));

        return $form;
    }
}
