<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX PRE VERIFICA</title>
</head>

<body>
    <?php
    // Esercizio PHP su array bidimensionali e funzioni

    // Sono forniti gli array elencati di seguito (i valori memorizzati sono solo indicativi) utilizzati per
    // monitorare la correttezza delle risposte della chat aziendale del sito internet:
    // $domanda1 = array('categoria' => "commerciale", 'risposta_corretta' => 0);
    // $domanda2 = array('categoria' => "assistenza", 'risposta_corretta' => 1);
    // $domanda3 = array('categoria' => "assistenza", 'risposta_corretta' => 0);
    // $domande = [$domanda1, $domanda2, $domanda3];
    // Si chiede di svolgere le seguenti attività:
    // 1. elencare le categorie delle domande (senza ripetizione!)
    // 2. quante sono le risposte corrette? (il valore 1 corrisponde alla risposta corretta);
    // 3. definire la funzione che ha come parametro d'ingresso l'array $domande e restituisce il
    // nome della categoria più utilizzata;
    // 4. modificare la funzione del punto precedente in modo che restituisca anche il numero di volte
    // che è stata utilizzata la categoria (N.B. una funzione può restituire 2 valori solo restituendo
    // un array)
    // 5. se ogni risposta alle domande costasse all'azienda 50 centesimi di euro, quanto sarebbe
    // costato rispondere alle domande? (scrivere i numeri nel formato corretto!)

    $domanda1 = array('categoria' => "commerciale", 'risposta_corretta' => 0);
    $domanda2 = array('categoria' => "assistenza", 'risposta_corretta' => 1);
    $domanda3 = array('categoria' => "assistenza", 'risposta_corretta' => 0);
    $domande = [$domanda1, $domanda2, $domanda3];

    // 1. elencare le categorie delle domande (senza ripetizione!)
    // uso array_unique per ripulirmi un array con tutte le chiavi che mi creo io, come nel file recupero.php

    // copio le categorie in un array nuovo
    $elenco_categorie = array();

    foreach ($domande as $domanda) {
        //inserisco il corso in un array
        $elenco_categorie[] = $domanda['categoria'];
    }
    //rimuovo le categorie duplicate
    $elenco_categorie = array_unique($elenco_categorie);
    // e poi stampo
    echo "<hr>";

    // --------------------------------------------------------------------------------------//
    // 3. definire la funzione che ha come parametro d'ingresso l'array $domande e restituisce il
    // nome della categoria più utilizzata;

    /**
     * Restituisce la categoria più utilizzata
     *
     * @param array $domande
     * @return string
     */
    function most_used($domande)
    {
        //la logica è simile al punto precedente, ma invece che usare ARRAY_UNIQUE
        //copio le categorie in un array


        //inizializzo l'array
        $elenco_categorie = array();

        foreach ($domande as $domanda) {
            //verifico se la domanda è già presente nell'array
            if (key_exists($domanda['categoria'], $elenco_categorie)) {
                //la categoria esiste già, aumento i partecipanti
                $elenco_categorie[$domanda['categoria']]++;
            } else {
                //la categoria non esiste, lo aggiungo all'array e inizializzo le domande a 1
                $elenco_categorie[$domanda['categoria']] = 1;
            }
        }

        //cerco la categoria che ha più domande
        $massimo = 0;
        foreach ($elenco_categorie as $key => $value) {
            if ($value > $massimo) {
                //il numero di domande è superiore al massimo, segno i valori
                $massimo = $value;
                $risultato = $key;
            }
        }

        return $risultato;
    }

    // poi richiamo la funzione e vedo che viene!
    most_used($domande);
    echo "<hr>";

    // --------------------------------------------------------------------------------------//
    // 4. modificare la funzione del punto precedente in modo che restituisca anche il numero di volte
    // che è stata utilizzata la categoria (N.B. una funzione può restituire 2 valori solo restituendo
    // un array)

    /**
     * Restituisce la categoria più utilizzata
     *
     * @param array $domande
     * @return string
     */
    function most_used_alt($domande)
    {
        //inizializzo l'array
        $elenco_categorie = array();

        foreach ($domande as $domanda) {
            //verifico se il corso è già presente nell'array
            if (key_exists($domanda['categoria'], $elenco_categorie)) {
                //la categoria esiste già, aumento i partecipanti
                $elenco_categorie[$domanda['categoria']]++;
            } else {
                //la categoria non esiste, lo aggiungo all'array e inizializzo le domande a 1
                $elenco_categorie[$domanda['categoria']] = 1;
            }
        }

        //cerco la categoria che ha piùà domande
        $massimo = 0;
        foreach ($elenco_categorie as $key => $value) {
            if ($value > $massimo) {
                //il numero di domande è superiore al massimo, segno i valori
                $massimo = $value;
                $risultato['valore'] =  $massimo;
                $risultato['categoria'] = $key;
            }
        }

        return $risultato;
    }

    var_dump(most_used_alt($domande));
    echo "<hr>";

    // --------------------------------------------------------------------------------------//
    // 5. se ogni risposta alle domande costasse all'azienda 50 centesimi di euro, quanto sarebbe
    // costato rispondere alle domande? (scrivere i numeri nel formato corretto!)
    // basta moltiplicare x0,5

    $costo = 0.5 * count($domande);
    echo "l''azienda ha speso " . $costo . '€';










    ?>

</body>

</html>