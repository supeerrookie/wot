<?php

namespace App\Admin\Controllers;

use App\Promo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Carbon\Carbon;

class PromoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Promo Bos';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Promo);
        $getdate = Carbon::now()->toDateString();
        $grid->quickSearch('code_promo', 'code_reedem_status', 'date_active');
        $grid->id('ID');
        $grid->uuid('Device Code');
        $grid->url('URL');
        $grid->code_promo('Promo Code');
        $redeem = [
            'on'  => ['value' => 1, 'text' => 'VALID', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $grid->code_reedem_status()->switch($redeem);
        $grid->date_active('Date Active Code');
        $grid->column('date_redeem')->editable('select', ['' => 'NO', $getdate => $getdate]);
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $grid->status()->switch($states);
        $grid->created_at('Create At')->date('Y-m-d');
        $grid->updated_at('Update At')->date('Y-m-d');
        $grid->filter(function($filter){
            $filter->like('code_promo', 'Code Promo');
            $filter->like('date_active', 'Date Active Promo');
            $filter->equal('status', 'Status URL')->radio([
                ''   => 'All',
                0    => 'NO',
                1    => 'YES',
            ]);
            $filter->equal('code_reedem_status', 'Status Reedem Code')->radio([
                ''   => 'All',
                0    => 'NO',
                1    => 'VALID',
            ]);
            $filter->like('date_redeem', 'Date Redeem Promo');

        });
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
        $show = new Show(Promo::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Promo);
        $form->text('url', 'URL');
        $form->text('code_promo', 'Code Promo');
        $form->date('date_active', 'Date Active');
        $form->date('date_redeem', 'Date Redeem Must Be NULL First');
        $redeem = [
            'on'  => ['value' => 1, 'text' => 'VALID', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('code_reedem_status', 'Redeem Status')->states($redeem);
        $states = [
            'on'  => ['value' => 1, 'text' => 'ACTIVE', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
        ];
        $form->switch('status', 'Status')->states($states);

        return $form;
    }
}
