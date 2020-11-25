<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use App\Models\Order;
use App\Repositories\Interfaces\StatisticRepositoryInterface;
use App\User;
use Carbon\Carbon;
use App\DateClass\Date;
class StatisticController extends Controller
{
    private $statisticRepository;

    public function __construct(
        StatisticRepositoryInterface $statisticRepository
    )
    {
        $this->statisticRepository = $statisticRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours = Order::whereBetween('created_at', [now()->format('Y-m-d H:00:00'),now()->addHours(1)->format('Y-m-d H:00:00')])
        ->count();

        $days = $this->statisticRepository->getStatisticDay();

        $week = $this->statisticRepository->getOrderTuan();

        $month = $this->statisticRepository->getOrderThang();

        $quarter = $this->statisticRepository->getOrderQuy();

        $year = $this->statisticRepository->getOrderNam();

        $listDay = Date::getListDayInMonth();

        $orderAccept = Order::where('status', 'Being transported')->whereMonth('created_at', date('m'))
        ->select(\DB::raw('sum(total_price) as Money'), \Db::raw('DATE(created_at) day'))
        ->groupBy('day')
        ->get()->toArray();

        $arrorderAccept = [];
        foreach($listDay as $day){
            $total = 0;
            foreach ($orderAccept as $key => $revenue) {
                if($revenue['day'] == $day){
                    $total = $revenue['Money'];
                    break;
                }
            }
            $arrorderAccept[] = $total;
        }

        $orderDefault = Order::where('status', 'Ordered')->whereMonth('created_at', date('m'))
        ->select(\DB::raw('sum(total_price) as Money'), \Db::raw('DATE(created_at) day'))
        ->groupBy('day')
        ->get()->toArray();

        $arrorderDefault = [];
        foreach($listDay as $day){
            $total = 0;
            foreach ($orderDefault as $key => $revenue) {
                if($revenue['day'] == $day){
                    $total = $revenue['Money'];
                    break;
                }
            }
            $arrorderDefault[] = $total;
        }
        $viewData = [
            'hours' => $hours,
            'days' => $days,
            'week' => $week,
            'month' => $month,
            'quarter' => $quarter,
            'year' => $year,
            'listDay' => json_encode($listDay),
            'arrorderAccept' => json_encode($arrorderAccept),
            'arrorderDefault' => json_encode($arrorderDefault),
        ];
        return view('admin.statistic.home', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
