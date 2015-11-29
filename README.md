# Professionelle Webentwicklung
## Übung ProductConfigurator
### Voraussetzungen:
* PHP7 mit phpdbg
* Composer global
* Apache ANT

### Installation:
Auf UNIX-basierten Systemen führen Sie
```
ant
```
im Projekt-Verzeichnis aus.

####Alternativ:

* Testdox
```
ant testdox
```

* Test Coverage
```
ant cov
```


### Vorgaben:

Erstellen sie die Geschäftslogik für einen Produktkonfigurator.
Dabei gelten die folgenden Geschäftsregeln:

* Artikel werden durch eine eindeutige ID identifiziert und
  haben einen Namen

* beim Kauf von bestimmten Artikeln können verschiedene Optionen
  hinzugewählt werden

* es gibt drei verschiedene Arten von Artikeln: Artikel ohne
  Optionen, Artikel mit maximal einer Option und Artikel mit
  mindestens einer und höchstens drei Optionen

* bestimmte Optionen sind nicht miteinander kombinierbar

* normalerweise sind Optionen jeweils nur auf bestimmte Artikel
  anwendbar; bestimmte Optionen wie Garantieverlängerungen oder
  Zusatzleistungen können jedoch auf alle Artikel angewendet
  werden, sofern diese generell Optionen zulassen

* jeder Artikel und jede Option haben einen Preis

* es kann pro Geschäftsvorgang nur ein einziger Artikel gekauft
  werden

* für den zu kaufenden Artikel müssen sowohl der Basispreis
  des Artikels als auch der Gesamtpreis inklusive aller
  gewählten Optionen angezeigt werden
