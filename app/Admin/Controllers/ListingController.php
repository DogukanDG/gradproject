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
        $grid->column('tags', __('Tags'));
        $grid->column('name', __('Name'));
        $grid->column('location', __('Location'));
        $grid->column('email', __('Email'));
        $grid->column('website', __('Website'));
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
        $show->field('tags', __('Tags'));
        $show->field('name', __('Name'));
        $show->field('location', __('Location'));
        $show->field('email', __('Email'));
        $show->field('website', __('Website'));
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
        $form->text('tags', __('Tags'));
        $form->text('name', __('Name'));
        $form->text('location', __('Location'));
        $form->email('email', __('Email'));
        $form->text('website', __('Website'));
        $form->textarea('description', __('Description'));

        return $form;
    }
}