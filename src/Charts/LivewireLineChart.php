<?php

namespace Aabosham\LivewireCharts\Charts;

use Aabosham\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

/**
 * Class LivewireLineChart
 * @package Aabosham\LivewireCharts\Charts
 */
class LivewireLineChart extends Component
{
    public $lineChartModel;

    public function mount(LineChartModel $lineChartModel)
    {
        $this->lineChartModel = $lineChartModel->toArray();
    }

    public function onPointClick($point)
    {
        $onPointClickEventName = data_get($this->lineChartModel, 'onPointClickEventName', null);

        if ($onPointClickEventName === null) {
            return;
        }

        $this->emit($onPointClickEventName, $point);
    }

    public function render()
    {
        if ($this->lineChartModel['isMultiLine']) {
            return view('livewire-charts::livewire-multi-line-chart');
        }

        return view('livewire-charts::livewire-line-chart');
    }
}
