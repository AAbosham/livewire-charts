<?php

namespace Aabosham\LivewireCharts\Charts;

use Aabosham\LivewireCharts\Models\RadialBarChartModel;
use Livewire\Component;

/**
 * Class RadialBarChart
 * @package Aabosham\LivewireCharts\Charts
 */
class LivewireRadialBarChart extends Component
{
    public $radialBarChartModel;

    public function mount(RadialBarChartModel $radialBarChartModel)
    {
        $this->radialBarChartModel = $radialBarChartModel->toArray();
    }

    public function onSliceClick($slice)
    {
        $onSliceClickEventName = data_get($this->radialBarChartModel, 'onSliceClickEventName', null);

        if ($onSliceClickEventName === null) {
            return;
        }

        $this->emit($onSliceClickEventName, $slice);
    }

    public function render()
    {
        return view('livewire-charts::livewire-radial-bar-chart');
    }
}
