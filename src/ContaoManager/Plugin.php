<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

namespace Schachbulle\ContaoDiskussionsforumBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Schachbulle\ContaoDiskussionsforumBundle\SchachbulleContaoDiskussionsforumBundle;

/**
 * Contao-Manager-Plugin zur Registrierung des Diskussionsforum-Bundles.
 *
 * Ueber dieses Plugin erkennt der Contao Manager das Bundle automatisch und
 * laedt es in der korrekten Reihenfolge - naemlich nach dem Contao-Core-Bundle,
 * damit dessen Dienste bereits zur Verfuegung stehen.
 */
class Plugin implements BundlePluginInterface
{
    /**
     * Registriert das Bundle im Contao-Kernel.
     *
     * @return array<BundleConfig>
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(SchachbulleContaoDiskussionsforumBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
