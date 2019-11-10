<?php

namespace App\Admin\Controllers;

use App\PageContent;
use App\Page;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PageContentController extends Controller
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
            ->header('Index')
            ->description('description')
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
        $grid = new Grid(new PageContent);
        $grid->pageContent('Page Root')->title();
        $grid->title('Title ID');
        $grid->slug('Slug');
        $grid->tagline('Tagline');
        $grid->url('Url Backlink');
        $grid->class_add('Special Class');
        $grid->image()->lightbox(['zooming' => true, 'width' => 50, 'height' => 50]);
      
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
        $show = new Show(PageContent::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PageContent);
        $form->select("id_page", "Choose page")->options(Page::all()->pluck("title", "id"));
        $form->text('title', 'Title');
        $form->text('tagline', 'Tagline');
        $form->text('slug', 'Url Slug');
        $form->text('url', 'Url Backlink');
        $form->text('class_add', 'Special Class Added');
        $form->file('image', 'Content Image/Media')->uniqueName()->move('/images/content-media/');
        $form->ckeditor('content', 'text Content');
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('status', 'Status')->states($states);


        return $form;
    }
}
