<?php

namespace App\Console\Commands;

use App\Models\PageView;
use Illuminate\Console\Command;

class PrunePageViews extends Command
{
    protected $signature = 'page-views:prune {--days=90 : Nombre de jours à conserver}';

    protected $description = 'Supprime les vues de pages plus anciennes que la durée de rétention';

    public function handle(): int
    {
        $days = max(1, (int) $this->option('days'));
        $deleted = PageView::where('created_at', '<', now()->subDays($days))->delete();

        $this->info("{$deleted} vue(s) de plus de {$days} jours supprimée(s).");

        return self::SUCCESS;
    }
}
