<?php

namespace Aabosham\LivewireCharts\Facades;

use Aabosham\LivewireCharts\Models\AreaChartModel;
use Aabosham\LivewireCharts\Models\ColumnChartModel;
use Aabosham\LivewireCharts\Models\LineChartModel;
use Aabosham\LivewireCharts\Models\PieChartModel;
use Illuminate\Support\Facades\Facade;

/**
 * Class LivewireCharts
 * @package Aabosham\LivewireCharts\Facades
 * @method static LineChartModel lineChartModel()
 * @method static LineChartModel multiLineChartModel()
 * @method static ColumnChartModel columnChartModel()
 * @method static ColumnChartModel multiColumnChartModel()
 * @method static AreaChartModel areaChartModel()
 * @method static PieChartModel pieChartModel()
 */
class LivewireCharts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'livewirecharts';
    }
}
