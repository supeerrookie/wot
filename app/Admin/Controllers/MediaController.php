<?php

namespace App\Admin\Controllers;

use App\Media;
use App\Lineups;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
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
            ->header('Content')
            ->description('All Content Photos/Video')
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
            ->header('Content')
            ->description('All Content Video/Photos By Artist')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *

     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Media);
        $grid->id('ID');
        $grid->mediaContent()->name();
        $grid->media_type('Type');
        $grid->media()->lightbox(['zooming' => true, 'width' => 50, 'height' => 50]);
        $grid->title('Title');
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
        $show = new Show(Media::findOrFail($id));

        $show->id('Id media');
        $show->id_page('Id page');
        $show->column('model.name');
        $show->media_type('Media type');
        $show->media('Media');
        $show->opening_player('Opening player');
        $show->title('Title');
        $show->tagline('Tagline');
        $show->desc('Desc');
        $show->status('Status');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Media);
        //$form->select('Page')->options(Page::class)->ajax('/admin/page');

        // $form->select("id_lineups", "Choose Artist")->options(function ($name) {
        //     $artist = Lineups::find($name);

        //     if ($artist) {
        //         return [$artist->id => $artist->name];
        //     }
        // })->ajax("/admin/api/getlineups")->rules('required');

        // $form->number('id_lineups', 'Id lineups');
        // 
        $form->select("id_lineups", "Choose Artist")->options(Lineups::all()->pluck("name", "id"));
        $type = [
            'Photos'  => 'Photos',
            'Video' => 'Video',
        ];
        $form->radio('media_type', 'Media type')->options($type)->rules('required');
        $form->file('media', 'Media')->rules('required')->uniqueName()->move('/images/lineup-content');
        $form->file('opening_player', 'Opening player');
        $form->text('title', 'Title');
        $form->text('tagline', 'Tagline');
        $form->textarea('desc', 'Desc');
        // $form->radio('status', 'Status')->options(['0' => 'No', '1'=> 'Active'])->default('1');
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('status', 'Status')->states($states);


        return $form;
    }

    public function setImagesAttribute($images)
    {
        if (is_array($images))
        {
            $this->attributes['images'] = json_encode($images);
        }
    }

    public function getImagesAttribute($images)
    {
        return json_decode($images, true);
    }

}