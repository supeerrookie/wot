<?php

namespace App\Admin\Controllers;

use App\Schedule;
use App\Lineups;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ScheduleController extends Controller
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
            ->header('Schedule')
            ->description('All Schedule Artist')
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
            ->header('Detail Schedule')
            ->description('All Schedule Artist')
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
            ->header('Edit Schedule')
            ->description('All Schedule Artist')
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
            ->header('Create Schedule')
            ->description('All Schedule Artist')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Schedule);
        $grid->id('ID')->sortable();
        $grid->scheduleContent()->name('Name');
        $grid->installation_name('Installation');
        $grid->stage('Stage');
        $grid->dateperform('Perform Day')->sortable();
        $grid->timeperform('Perform Time')->sortable();
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
        $show = new Show(Schedule::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Schedule);
        $form->select("id_lineups", "Choose Artist")->options(Lineups::all()->pluck("name", "id"));
        $stage = [
            'Main Stage' => 'Main Stage',
            'Sharing Session' => 'Sharing Session',
            'Outdoor Lounge' => 'Outdoor Lounge'
        ];
        $form->select('stage', 'Stage')->options($stage);
        $form->text('installation_name', 'Insatallation Name');
        $form->ckeditor('installation_detail', 'Insatallation Detail');
        $form->text('id_day', 'Day Event');
        $class = [
            'link-disable' => 'Link Disable',
            '' => 'none',
        ];
        $form->radio('class_add', 'Special Class')->options($class);
        $form->date('dateperform', 'Date Perform');
        $form->time('timeperform', 'Time Perform')->format('HH:mm:ss');
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('status', 'Status')->states($states);
        return $form;
    }
}
