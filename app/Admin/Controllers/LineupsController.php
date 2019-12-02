<?php

namespace App\Admin\Controllers;

use App\Lineups;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class LineupsController extends Controller
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
            ->header('Line Ups')
            ->description('All Line Ups Performance')
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
            ->header('Line Up / Performerce')
            ->description('WOT19 Performerce')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Lineups);

        $grid->id('ID')->sortable();
        $grid->name('Name');
        $grid->installation_name('Installation Name');
        $grid->visual('Visual Pict By');
        $grid->stage('Stage');
        $grid->slug('Slug');
        $grid->lineups_type('Type')->sortable();
        $grid->image()->lightbox(['zooming' => true, 'width' => 50, 'height' => 50]);
        $top6 = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $grid->highlights()->switch($top6);
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
        $show = new Show(Lineups::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Lineups);

        $form->display('id', 'ID');
        $form->text('name', 'Name');
        $type = [
            'Sight'  => 'Sight',
            'Artist' => 'Artist',
            'Show' => 'Show',
            'Talks' => 'Talks',
            'CURATOR'  => 'CURATOR *(Special Mona Liem Only)',
        ];
        $form->radio('lineups_type', 'Type')->options($type)->required();
        $form->text('installation_name', 'Insatallation Name');
        $form->ckeditor('bio', 'Biography')->rows(5);
        $form->ckeditor('detail', 'Detail Biography')->rows(5);
        $form->image('image')->uniqueName()->move('/images/lineup')->thumbnail([
            'medium' => [300, null],
            'large'  => [600, null],
        ]);
        $form->text('slug', 'Slug');
        $form->date('perform', 'Date Perform');
        $form->time('time_perform', 'Time Perform')->format('HH:mm:ss');
        $top6 = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('highlights', 'TOP 6 LINEUPS')->states($top6);
        $stage = [
            'Main Stage' => 'Main Stage',
            'Sharing Session' => 'Sharing Session',
            'Outdoor Lounge' => 'Outdoor Lounge'
        ];
        $form->select('stage', 'Stage')->options($stage);
        $form->ckeditor('description', 'description')->rows(10);
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('status', 'Status')->states($states);
        $form->display('created_at', 'Created At');
        $form->display('updated_at', 'Updated At');


        return $form;
    }

    public function getLineups(Request $request){
        $q = $request->get("q");
        // return Lineups::where("name", "like", "%".$q."%")->paginate(null, ["id", "name"]);
        return Lineups::where("name", "like", "%".$q."%")->paginate(null, ["id as id", "name as text"]);
    }
}