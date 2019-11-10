<?php

namespace App\Admin\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class GalleryController extends Controller
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
            ->header('All Gallery')
            ->description('Wot Gallery')
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
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Gallery);
        $grid->id('ID')->sortable();
        $grid->title('Title');
        $grid->slug('Slug');
        $grid->year('Year')->sortable();
        $grid->dateshow('Date Showing')->sortable();
        $grid->exclusive('Exclusive Preview')->sortable();

        $grid->image()->lightbox(['zooming' => true, 'width' => 50, 'height' => 50]);


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
        $show = new Show(Gallery::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Gallery);

        $form->text('title', 'Title');
        $form->text('slug', 'Slug');
        $form->image('image')->uniqueName()->move('/images/gallery')->thumbnail([
            'medium' => [300, null],
            'large'  => [600, null],
        ]);
        $form->year('year');
        $form->date('dateshow', 'Date Showing');
        $form->textarea('description', 'Desc');
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('exclusive', 'Exclusive Preview')->states($states);
        return $form;
    }
}
