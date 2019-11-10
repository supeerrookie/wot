<?php

namespace App\Admin\Controllers;

use App\Page;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PageController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Page')
            ->description('All Page')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('New Page')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page);
        $grid->id('ID')->sortable();
        $grid->title('Title');
        $grid->desc('Description');
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $grid->status()->switch($states);

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
        $show = new Show(Page::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Page);
        $form->display('id', 'ID');
        $form->text('title', 'Title')->rules('required|min:3');
        $form->textarea('desc', 'description')->rows(10);
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('status','Status')->states($states);
        //$form->radio('status', 'Status')->options(['0' => 'No', '1'=> 'Active'])->default('1');
        $form->display('created_at', 'Created At');
        $form->display('updated_at', 'Updated At');



        return $form;
    }
}
