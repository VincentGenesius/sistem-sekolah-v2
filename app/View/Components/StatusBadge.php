<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    public string $status;
    public string $badgeClass;

    /**
     * Create a new component instance.
     */
    public function __construct(string $status = 'Aktif')
    {
        $this->status = $status;

        // Menentukan style warna berdasarkan nilai status
        if (strtolower($status) === 'aktif') {
            $this->badgeClass = 'bg-green-100 text-green-800 border-green-200';
        } else {
            $this->badgeClass = 'bg-red-100 text-red-800 border-red-200';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-badge');
    }
}