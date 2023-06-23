<?php

namespace App\Admin\Controllers;

use App\Models\JobSeekerListing;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class JobSeekerListingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'JobSeekerListing';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new JobSeekerListing());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('title', __('Title'));
        $grid->column('name', __('Name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('is_active', __('Is active'));
        $grid->column('skills', __('Skills'));
        $grid->column('educations', __('Educations'));
        $grid->column('experience', __('Experience'));
        $grid->column('location', __('Location'));
        $grid->column('email', __('Email'));
        $grid->column('applysearch', __('Applysearch'));
        $grid->column('expiration_date', __('Expiration date'));
        $grid->column('cv', __('Cv'));
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
        $show = new Show(JobSeekerListing::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('title', __('Title'));
        $show->field('name', __('Name'));
        $show->field('last_name', __('Last name'));
        $show->field('is_active', __('Is active'));
        $show->field('skills', __('Skills'));
        $show->field('educations', __('Educations'));
        $show->field('experience', __('Experience'));
        $show->field('location', __('Location'));
        $show->field('email', __('Email'));
        $show->field('applysearch', __('Applysearch'));
        $show->field('expiration_date', __('Expiration date'));
        $show->field('cv', __('Cv'));
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
        $form = new Form(new JobSeekerListing());

        $form->number('user_id', __('User id'));
        $form->text('title', __('Title'));
        $form->text('name', __('Name'));
        $form->text('last_name', __('Last name'));
        $form->switch('is_active', __('Is active'))->default(1);
        $form->textarea('skills', __('Skills'));
        $form->textarea('educations', __('Educations'));
        $form->text('experience', __('Experience'));
        $form->text('location', __('Location'));
        $form->email('email', __('Email'));
        $form->switch('applysearch', __('Applysearch'));
        $form->datetime('expiration_date', __('Expiration date'))->default(date('Y-m-d H:i:s'));
        $form->text('cv', __('Cv'));
        $form->textarea('description', __('Description'));

        return $form;
    }
}
