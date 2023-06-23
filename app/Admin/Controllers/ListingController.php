<?php

namespace App\Admin\Controllers;

use App\Models\Listing;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ListingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Listing';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Listing());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('title', __('Title'));
        $grid->column('logo', __('Logo'));
        $grid->column('is_active', __('Is active'));
        $grid->column('skills', __('Skills'));
        $grid->column('person_need', __('Person need'));
        $grid->column('name', __('Name'));
        $grid->column('expiration_date', __('Expiration date'));
        $grid->column('location', __('Location'));
        $grid->column('email', __('Email'));
        $grid->column('applysearch', __('Applysearch'));
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
        $show = new Show(Listing::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('title', __('Title'));
        $show->field('logo', __('Logo'));
        $show->field('is_active', __('Is active'));
        $show->field('skills', __('Skills'));
        $show->field('person_need', __('Person need'));
        $show->field('name', __('Name'));
        $show->field('expiration_date', __('Expiration date'));
        $show->field('location', __('Location'));
        $show->field('email', __('Email'));
        $show->field('applysearch', __('Applysearch'));
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
        $form = new Form(new Listing());

        $form->number('user_id', __('User id'));
        $form->text('title', __('Title'));
        $form->text('logo', __('Logo'));
        $form->switch('is_active', __('Is active'))->default(1);
        $form->textarea('skills', __('Skills'));
        $form->number('person_need', __('Person need'))->default(1);
        $form->text('name', __('Name'));
        $form->datetime('expiration_date', __('Expiration date'))->default(date('Y-m-d H:i:s'));
        $form->text('location', __('Location'));
        $form->email('email', __('Email'));
        $form->switch('applysearch', __('Applysearch'));
        $form->textarea('description', __('Description'));

        return $form;
    }
}
