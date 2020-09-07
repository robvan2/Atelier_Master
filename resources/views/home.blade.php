@extends('layouts.app')

@section('content')
<div class="container text-justify mb-5">
    <h2>Pneumonie :</h2>
    <p class="text-justify">La pneumonie est une maladie courante qui continue à être l’une des principales causes de décès des enfants 
        dans les pays en cours de développement et des personnes âgées dans les pays développés [3]. C’est une 
        infection des poumons causée le plus souvent par un virus ou une bactérie. L’infection touche plus précisément
        les alvéoles pulmonaires, ces minuscules sacs en forme de ballons situés à l’extrémité des bronchioles.
        Elle touche généralement un seul des cinq lobes du poumon, d’où le terme pneumonie lobaire. Lorsque la 
        pneumonie atteint aussi les bronches, on l’appelle bronchopneumonie [4].
    </p>
    <p>Selon les estimations de l’Organisation Mondiale de la Santé (OMS ou WHO en anglais), 450 millions cas de 
        pneumonie sont enregistrés chaque année ; environ 4 millions meurent de cette maladie, représentant 7% 
        de la mortalité totale de 57 millions de personnes [2][5]. Les incidences les plus élevées surviennent 
        chez les enfants de moins de 5 ans et chez les adultes de plus de 75 ans <a href="#fig-1" style="color: black">(Figure 1)</a> [3].</p>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center" id="fig-1">
            <div class="row">
                <img class="img-fluid" src="{{asset('images/incedence_pneumonia.jpg')}}" alt="incedence_pneumonia.jpg">
            </div>
            <div class="row text-center">
               <p> <b>Figure 1: </b> Incidence de la pneumonie communautaire selon l’âge [3]</p>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <h2>Etiologie :</h2>
    <p>De nombreux micro-organismes sont associés à la pneumonie (bactéries, virus ou champignons). Parmi les bactéries, 
        le Streptococcus pneumoniae continue d’être le principal pathogène chez les enfants de tout âge. La pneumonie 
        à streptocoque du groupe A est beaucoup moins courante. Même si le Staphylococcus aureus n’est pas une cause 
        courante de pneumonie pédiatrique, on l’observe de plus en plus dans les collectivités où le Staphylococcus 
        aureus méthicillinorésitant est prévalent. L’Haemophilus influenzae de type B a presque disparu grâce à la vaccination. 
        Le Mycoplasma pneumoniae et le Chlamydophila pneumoniae sont des causes plus fréquentes de pneumonie chez les enfants 
        d’âge scolaire, mais ils sont parfois responsables d’une pneumonie chez des enfants plus jeunes [10].</p>
        <div class="col-md-6 offset-md-3 text-center" id="fig-2">
            <div class="row">
                <img class="img-fluid" src="{{asset('images/xray.jpg')}}" alt="xray.jpg">
            </div>
            <div class="row">
               <p> <b>Figure 2: </b> Radiographies pulmonaires de patients atteints de pneumonie virale [3] </p>
            </div>
        </div>
        <div class="row text-justify">
            <p>(A) Pneumonie causée par le Boca virus humain chez une fille de 1 an. La radiographie thoracique montre 
                des infiltrats alvéolaires dans le lobe moyen droit et le lobe inférieur gauche. </p>
            <p>(B) Pneumonie causée par le métapneumovirus et Haemophilus inﬂuenzae chez une fille de 7 ans. 
                La radiographie du thorax montre un infiltrat alvéolaire dans le lobe inférieur gauche. </p>
            <p>(C) Pneumonie causée par le rhinovirus et Streptococcus pneumoniae chez une fille de 11 ans. 
                La radiographie du thorax montre un infiltrat alvéolaire dans le lobe inférieur droit. 
            </p>
            <p>(D) Pneumonie causée par l'adénovirus chez un homme de 22 ans. La radiographie thoracique 
                montre des infiltrats alvéolaires et interstitiels dans le lobe inférieur droit.
            </p>
        </div>

    <div class="line"></div>

    <h2>Sypmtômes et signs :</h2>
    <p>Les symptômes sont identiques pour les pneumonies virales ou bactériennes. 
        Dans le cas d’une pneumonie virale, ils peuvent néanmoins être plus nombreux que 
        pour une pneumonie bactérienne.[1]
    </p>
    <p>Les symptômes évocateurs d'une pneumonie comprennent une fièvre associée à des symptômes 
        respiratoires tels que toux, production de crachats, pleurésie et dyspnée. Des symptômes 
        similaires peuvent être causés par une bronchite aiguë, une sinusite et diverses maladies 
        non infectieuses. Les patients âgés présentent souvent moins de symptômes ou des symptômes 
        moins graves que les patients plus jeunes. Les résultats physiques incluent de la fièvre 
        chez 80% des patients ; la plupart ont une fréquence respiratoire supérieure à 20 par minute, 
        des crépitements sont entendus à l'auscultation dans 80% des cas et jusqu'à 30% ont des signes 
        de consolidation [13][14].</p>

    <div class="line"></div>

    <h3>Diagnostic :</h3>
    <p>La plupart des patients atteints de pneumonie acquise dans la communauté sont traités en ambulatoire
         et ne nécessitent pas d'études approfondies, à l'exception d'un film radiographique pour établir 
         le diagnostic, des études de laboratoire sélectionnées pour déterminer l'étendue de la maladie et 
         des conditions associées, et des études microbiologiques. 
        Les tests de laboratoire suggérés pour les patients hospitalisés sont résumés dans Tableau 2 [13].</p>
</div>
@endsection
