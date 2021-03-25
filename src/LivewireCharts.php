<?php


namespace Aabosham\LivewireCharts;


use Aabosham\LivewireCharts\Models\AreaChartModel;
use Aabosham\LivewireCharts\Models\ColumnChartModel;
use Aabosham\LivewireCharts\Models\LineChartModel;
use Aabosham\LivewireCharts\Models\PieChartModel;
use Aabosham\LivewireCharts\Models\RadialBarChartModel;

class LivewireCharts
{
    public function lineChartModel()
    {
        return (new LineChartModel)
            ->singleLine();
    }

    public function multiLineChartModel()
    {
        return (new LineChartModel)
            ->multiLine();
    }

    public function columnChartModel()
    {
        return (new ColumnChartModel)
            ->singleColumn();
    }

    public function multiColumnChartModel()
    {
        return (new ColumnChartModel)
            ->multiColumn();
    }

    public function areaChartModel()
    {
        return new AreaChartModel;
    }

    public function pieChartModel()
    {
        return new PieChartModel;
    }

    public function RadialBarChartModel()
    {
        return new RadialBarChartModel;
    }
}
