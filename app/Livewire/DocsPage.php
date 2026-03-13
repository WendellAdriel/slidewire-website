<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Support\Docs\DocsPage as DocsPageData;
use App\Support\Docs\DocsRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class DocsPage extends Component
{
    public string $slug = '';

    public function mount(?string $page = null): void
    {
        $this->slug = $page ?? '';
    }

    public function render(DocsRepository $docs): View
    {
        $page = $docs->find($this->slug);

        abort_if(! $page instanceof DocsPageData, 404);

        return view('livewire.docs-page', [
            'page' => $page,
        ]);
    }
}
