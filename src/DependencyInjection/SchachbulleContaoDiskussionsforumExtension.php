<?php

declare(strict_types=1);

/*
 * Dieses Bundle stellt ein Diskussionsforum fuer Contao 4.13 bereit.
 *
 * @license LGPL-3.0-or-later
 */

namespace Schachbulle\ContaoDiskussionsforumBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * DependencyInjection-Extension des Diskussionsforum-Bundles.
 *
 * Diese Klasse wird vom Bundle automatisch ueber die Symfony-Namenskonvention
 * gefunden (Bundle-Klassenname ohne "Bundle"-Suffix + "Extension") und muss
 * daher nicht gesondert registriert werden. Sie laedt die Service-Definitionen
 * aus der services.yaml in den Container.
 *
 * Der Alias der Extension wird aus dem Klassennamen abgeleitet und lautet
 * "schachbulle_contao_diskussionsforum" - passend zum Service-ID-Praefix in
 * der services.yaml.
 */
class SchachbulleContaoDiskussionsforumExtension extends Extension
{
    /**
     * Laedt die Service-Konfiguration des Bundles in den Container.
     *
     * @param array<mixed> $configs Zusammengefuehrte Bundle-Konfiguration (hier ungenutzt)
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.yaml');
    }
}
