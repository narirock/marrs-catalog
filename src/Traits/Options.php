<?php

namespace Marrs\MarrsCatalog\Traits;

trait Options
{
    public function getDefaultAditional()
    {
        $aditional = 0;
        $options = $this->options;
        foreach ($options as $option) {
            $po = $option->values->where('quantity', '>', 0)->first();
            $aditional += @$po->price;
        }

        return $aditional;
    }

    public function getPrice()
    {
        return $this->price + $this->getDefaultAditional();
    }

    public function getPromo()
    {
        $value = null;
        if ($this->promo) {
            $value = $this->promo->price + $this->getDefaultAditional();
        }
        return $value;
    }
}
