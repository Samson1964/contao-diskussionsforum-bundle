<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

namespace Schachbulle\ContaoDiskussionsforumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Haupt-Bundle-Klasse des Diskussionsforum-Bundles.
 *
 * Diese Klasse bindet das Bundle in den Symfony-/Contao-Kernel ein. Sie kann bei
 * Bedarf erweitert werden, etwa um eine eigene DependencyInjection-Extension zu
 * laden oder das Verhalten beim Container-Aufbau anzupassen.
 */
class SchachbulleContaoDiskussionsforumBundle extends Bundle
{
}
