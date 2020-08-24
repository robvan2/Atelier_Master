@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" 
        $integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" 
        crossorigin="anonymous">
    </script>

    <div class="container">
        <div class="row d-block ">
            <h1 class="text-center">
                Evolution durant l'entrainement
            </h1>
        </div>
        <div class="row mt-5">
            <div class="container d-block col-md-6 col-12 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum 
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!</p>
            </div>
            <canvas id="training-loss" class="col-md-6 col-12 d-inline"></canvas>
        </div>
        <div class="row mt-5">
            <canvas id="training-accuracy" class="col-md-6 col-12 d-inline"></canvas>
            <div class="container d-block col-md-6 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum 
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="container d-block col-md-6 col-12 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum 
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!
                </p>
            </div>
            <canvas id="val-loss" class="col-md-6 col-12 d-inline"></canvas>
        </div>
        <div class="row mt-5">
            <canvas id="val-accuracy" class="col-md-6 col-12 d-inline"></canvas>
            <div class="container d-block col-md-6 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum 
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <canvas id="bar-chart" class="col-md-12 col-12 d-inline"></canvas>
        </div>
    </div>
    <script>
        Chart.defaults.global.elements.line.fill = false;
        Chart.defaults.global.elements.line.tension = false;
        var ctx = document.getElementById('training-loss').getContext('2d');
        var training_loss = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 , 12 , 13 , 14 , 15 , 16 , 17 , 18 , 19 , 20 , 21 , 22 , 23 , 24 , 25 , 26 , 27 , 28 , 29 , 30 , 31 , 32 , 33 , 34 , 35 , 36 , 37 , 38 , 39 , 40 , 41 , 42 , 43 , 44 , 45 , 46 , 47 , 48 , 49 , 50 ],
                datasets: [
                {
                    label: 'efficientNetB4',
                    data: [0.3274373960641264, 0.14362319987381528, 0.1077153764756545, 0.0811524725764807, 0.08506259524429137, 0.06683560929895362, 0.0637868730739856, 0.057339194090751236, 0.051714449239597636, 0.045832756951742694, 0.03752544633558511, 0.032470391175503974, 0.033348759115627895, 0.02762830842759866, 0.03279203211387299, 0.026521488813471987, 0.029141279699158015, 0.028842416580157938, 0.02939665093096659, 0.024175043778488288, 0.019799436474336095, 0.027479031301057822, 0.025205123708301302, 0.019146784939524642, 0.010309903028523235, 0.012570519835553903, 0.013656539172272482, 0.010408721496274287, 0.011124791229484593, 0.012848118589050064, 0.013221103019253179, 0.02072282067355964, 0.014138186464224194, 0.01138744275129373, 0.015658004506776093, 0.010934324701020438, 0.014957193821304202, 0.006623166075752665, 0.00683541215951167, 0.010188727295882336, 0.013591945439584602, 0.01860501615126493, 0.00942468241159456, 0.005747226867510543, 
                    0.038628445290819984, 0.015939736190448233, 0.026357333140395598, 0.009340272765212758, 0.009103865035776723, 0.006528563025976893],
                    borderColor	: 'rgba(152, 22, 56, 0.7)'
                }
                ,
                {
                    label: 'MobileNet-V2',
                    data: [0.25161163019804866, 0.12187295876717641, 0.09262115762574724, 0.08978264230914826, 0.07704887402592445, 0.060617139980059825, 0.06397831991909106, 0.044165016390508946, 0.04092346190080687, 0.046577936644020254, 0.03372976325160933, 0.03397319346460645, 0.03351821445972813, 0.0440075148298388, 0.028855543041550354, 0.03940522241187596, 0.02608338218865105, 0.030865454934523126, 0.0196010137056829, 0.02704501937734866, 0.03511999872301711, 0.02164574806343484, 0.0192690586495896, 0.0160889553718206, 0.02763116130004694, 0.017264936866554392, 0.009577214341657807, 0.017612628549200975, 0.018852899215995488, 0.02005688632474898, 0.012832246589912902, 0.01837992321195808, 0.017150044048924045, 0.01825382158831919, 0.011981241553921846, 0.011188710928573901, 0.01553002985992806, 0.008660854637775316, 0.030351559498952272, 0.017314764961083935, 0.011543048497643307, 0.014268554577659643, 0.0037970364128955087, 0.013298171785621878,
                    0.008020144136461137, 0.009269192354232066, 0.008855050875008267, 0.010753100087914039, 0.01244938518625057, 0.007009190073063807],
                    borderColor	: 'rgba(124, 207, 114, 1)'
                }
                ,
                {
                    label: 'VGG-16',
                    data: [0.3606759781486418, 0.21914985209154936, 0.18509990726511902, 0.13319325257389825, 0.10874268401734119, 0.13430777076128986, 0.11628094883464231, 0.1046475259175787, 0.09109070573710591, 0.08607362916955918, 0.10905395593334195, 0.07271457847459184, 0.0679529142977407, 0.073084279186338, 0.06313160526354802, 0.05211945342191386, 0.05779794872412744, 0.06692819149901896, 0.0575015002281685, 0.051821871353541875, 0.050174528291517514, 0.04822328357465931, 0.05811590189685577, 0.05589527435503626, 0.04591778495371845, 0.05174626084044576, 0.04020595719517877, 0.031147742566818293, 0.04128969363094039, 0.03814987907831791, 0.04151951212027436, 0.041085420339225444, 0.029283317202342205, 0.03536246959912802, 0.029758239633109466, 0.026552823703218983, 0.0425675254360847, 0.03149946115195374, 0.026027872814922564, 0.01982972276807003, 0.019472602345949278, 0.02722149584235258, 0.023572891446736077, 0.022109100319612256,
                    0.030223328163818758, 0.03088210229054836, 0.015027488259015821, 0.02278319089759164, 0.034053758338295166, 0.01748201977197321],
                    borderColor	: 'rgba(67, 112, 168, 0.8)'
                }
                ,
                {
                    label: 'Inception-V3',
                    data:[0.19839679665772095, 0.10855421631888378, 0.07789119145907233, 0.05941984192982453, 0.051168706693737964, 0.04474111464291674, 0.03756637365680097, 0.037767542372571954, 0.048451180785517294, 0.02102512693635411, 0.025874979860446432, 0.02813987933210686, 0.03345897093135292, 0.018622593270711876, 0.02422626620298537, 0.029936017523565405, 0.02068608747459548, 0.06894970480231226, 0.04488152821449723, 0.025108039796572362, 0.017160200202684748, 0.013823455807387235, 0.014023355851032017, 0.015877945709025825, 0.01591432743991134, 0.022531342921575725, 0.008665619190640182, 0.008265942420833316, 0.015081128668403568, 0.014931539380515817, 0.009987426447493532, 0.0066111987650228745, 0.015101058627834094, 0.013266386640825212, 0.017390111738035993, 0.015676165873611893, 0.0064789496171695285, 0.009921891879228921, 0.021449780154671874, 0.01510903979728407, 0.008805144209421148, 0.011635270243599165, 0.011240667368191083, 0.006626644207573884, 
                        0.046771504021174005, 0.013538967278529605, 0.010672458749401249, 0.0073041186079295765, 0.003462324424193632, 0.014735134048367767],
                    borderColor	: 'rgba(229, 214, 6, 0.92)'
                }
                ,
                {
                    label: 'Resnet-50',
                    data:[0.19739348258526046, 0.14413529497348457, 0.12388608678946832, 0.10722929401540317, 0.10369076462965345, 0.10421565695854326, 0.08553863773722362, 0.10639200965085416, 0.09949563466800959, 0.08743527437063174, 0.0911349782111706, 0.07656001587872582, 0.07668726882423085, 0.07426872015416484, 0.07261971271871104, 0.07124339331632788, 0.06865911751641303, 0.06580788491613751, 0.05966936263535743, 0.06813085325307962, 0.05968325448713831,
                            0.06015917976198295, 0.0563365652031648, 0.05877977013702224, 0.06439077053961853],
                    borderColor	: 'rgba(0, 0, 0, 0.63)'
                }
                ]
                
            },
            options: {
                title: {
                    text : 'La perte durant l\'entrainement',
                    display: true,
                    position: 'bottom'
                },

                elements: {
                    point:{
                        radius: 0
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Training loss',
                            fontSize: 14
                        }     
                    }],
                    xAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Epochs',
                            fontSize: 14
                        }     
                    }]
                }
            }
        });
    </script>
    <script>
        var tAcc = document.getElementById('training-accuracy').getContext('2d');
        var training_accuracy = new Chart(tAcc, {
            type: 'line',
            data: {
                labels: [1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 , 12 , 13 , 14 , 15 , 16 , 17 , 18 , 19 , 20 , 21 , 22 , 23 , 24 , 25 , 26 , 27 , 28 , 29 , 30 , 31 , 32 , 33 , 34 , 35 , 36 , 37 , 38 , 39 , 40 , 41 , 42 , 43 , 44 , 45 , 46 , 47 , 48 , 49 , 50 ],
                datasets: [
                {
                    label: 'efficientNetB4',
                    data: [0.88075155, 0.9589724, 0.96702456, 0.9737347, 0.9735429, 0.97641873, 0.9791028, 0.98140335, 0.985046, 0.98562115, 0.9902224, 0.9907975, 0.98983896, 0.9913727, 0.9883052, 0.99118096, 0.9913727, 0.9915644, 0.99098927, 0.99233127, 0.9944402, 0.9902224, 0.99290645, 0.993865, 0.9969325, 0.99597394, 0.99597394, 0.99712425, 0.99731594, 0.9957822, 0.99539876, 0.9934816, 0.9957822, 0.99654907, 0.993865, 0.99597394, 0.99539876, 0.9976994, 0.9980828, 
                            0.9975077, 0.99616563, 0.9936733, 0.9969325, 0.9978911, 0.99290645, 0.99539876, 0.993865, 0.99712425, 0.9967408, 0.99827456],
                    borderColor	: 'rgba(152, 22, 56, 0.7)'
                }
                ,
                {
                    label: 'MobileNet-V2',
                    data: [0.91391873, 0.9662577, 0.9712423, 0.97258437, 0.97450155, 0.9821702, 0.9810199, 0.9869632, 0.9865798, 0.9858129, 0.98926383, 0.9902224, 0.98983896, 0.986388, 0.98926383, 0.98868865, 0.9913727, 0.99060583, 0.9946319, 0.9902224, 0.99060583, 0.99290645, 0.99290645, 0.9955905, 0.9915644, 0.9952071, 0.9976994, 0.99424845, 0.9946319, 0.9927147, 0.99597394, 0.99424845, 0.9944402, 0.9946319, 0.9969325, 0.99654907, 0.9950153, 0.9978911, 0.9950153, 
                            0.9946319, 0.9969325, 0.99616563, 0.998658, 0.9952071, 0.99827456, 0.9963574, 0.99654907, 0.9969325, 0.9967408, 0.99712425] ,
                    borderColor	: 'rgba(124, 207, 114, 1)'
                }
                ,
                {
                    label: 'VGG-16',
                    data: [0.8629218, 0.9351994, 0.94746935, 0.9645322, 0.967408, 0.9622316, 0.96165645, 0.9645322, 0.97162575, 0.97335124, 0.96836656, 0.9773773, 0.9766104, 0.9773773, 0.9808282, 0.98447084, 0.98006135, 0.9796779, 0.97891104, 0.98197854, 0.9835123, 0.983704, 0.9808282, 0.982362, 0.985046, 0.985046, 0.9881135, 0.9881135, 0.9858129, 0.9879218, 0.98542947, 0.98562115, 0.9894555, 0.9877301, 0.9907975, 0.99060583, 0.9869632, 0.9902224, 0.99233127, 0.9936733, 
                    0.9936733, 0.98983896, 0.9927147, 0.9919478, 0.9888804, 0.99118096, 0.99616563, 0.9919478, 0.9879218, 0.9944402],
                    borderColor	: 'rgba(67, 112, 168, 0.8)'
                }
                ,
                {
                    label: 'Inception-V3',
                    data:[0.9355828, 0.9693251, 0.97776073, 0.983704, 0.9838957, 0.9871549, 0.9881135, 0.98983896, 0.9846626, 0.9957822, 0.99290645, 0.99118096, 0.9896472, 0.99482363, 0.9934816, 0.99309814, 0.9932899, 0.98562115, 0.99003065, 0.9934816, 0.9957822, 0.9963574, 0.99597394, 0.9946319, 0.99616563, 0.99309814, 0.9976994, 0.9978911, 0.99539876, 0.99424845, 0.9969325, 0.9980828, 0.9969325, 0.9955905, 0.9946319, 0.9957822, 0.9980828, 0.99731594, 0.9936733, 0.9955905, 0.99731594, 0.9957822, 
                            0.9963574, 0.9978911, 0.98926383, 0.9952071, 0.99654907, 0.9969325, 0.9992331, 0.9955905],
                    borderColor	: 'rgba(229, 214, 6, 0.92)'
                }
                ,
                {
                    label: 'Resnet-50',
                    data: [0.9254218, 0.9428681, 0.955138, 0.95993096, 0.96414876, 0.9620399, 0.9681749, 0.9633819, 0.96529907, 0.96702456, 0.9656825, 0.9720092, 0.97258437, 0.9699003, 0.9735429, 0.9723926, 0.976227, 
                            0.97641873, 0.97871935, 0.976227, 0.9798696, 0.9771856, 0.97871935, 0.97891104, 0.98006135],
                    borderColor	: 'rgba(0, 0, 0, 0.63)'
                }
                ]
                
            },
            options: {
                title: {
                    text : 'La justesse durant l\'entrainement',
                    display: true,
                    position: 'bottom'
                },

                elements: {
                    point:{
                        radius: 0
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Training Accuracy',
                            fontSize: 14
                        }     
                    }],
                    xAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Epochs',
                            fontSize: 14
                        }     
                    }]
                }
            }
        });
    </script>
    <script>
        var vLoss = document.getElementById('val-loss').getContext('2d');
        var val_loss = new Chart(vLoss, {
            type: 'line',
            data: {
                labels: [1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 , 12 , 13 , 14 , 15 , 16 , 17 , 18 , 19 , 20 , 21 , 22 , 23 , 24 , 25 , 26 , 27 , 28 , 29 , 30 , 31 , 32 , 33 , 34 , 35 , 36 , 37 , 38 , 39 , 40 , 41 , 42 , 43 , 44 , 45 , 46 , 47 , 48 , 49 , 50 ],
                datasets: [
                {
                    label: 'efficientNetB4',
                    data: [0.8704628348350525, 1.0270004272460938, 1.1643311977386475, 0.46688348054885864, 0.5984351634979248, 0.2446545958518982, 0.391874223947525, 0.37655165791511536, 0.42259013652801514, 0.6986798644065857, 0.045657940208911896, 0.047919657081365585, 0.09698022902011871, 0.028489746153354645, 0.19439126551151276, 0.039396733045578, 0.0036464002914726734, 0.3016277551651001, 0.08580975234508514, 0.023960689082741737, 0.2342250496149063, 0.14141932129859924, 0.002040483057498932, 0.15655654668807983, 0.6399045586585999, 0.0020080257672816515, 0.02389203943312168, 0.28361475467681885, 0.5239422917366028, 0.0018280120566487312, 0.0953025221824646, 0.016723277047276497, 0.03184272348880768, 0.4187636077404022, 0.18667934834957123, 0.2652227580547333, 0.14086376130580902, 0.012729663401842117, 0.4419897198677063, 0.00022230228933040053, 0.08574885129928589, 0.00357032404281199, 0.0005401314701884985, 0.19609510898590088, 0.2562289237976074, 
                            0.06223934143781662, 0.008719690144062042, 0.0016109701246023178, 0.10889919102191925, 0.0034946089144796133],
                    borderColor	: 'rgba(152, 22, 56, 0.7)'
                }
                ,
                {
                    label: 'MobileNet-V2',
                    data: [0.6225351095199585, 1.0139409303665161, 1.207289457321167, 0.40903258323669434, 1.155989646911621, 0.27646780014038086, 0.29353705048561096, 1.0745962858200073, 0.4621305465698242, 0.980449914932251, 0.7631455659866333, 0.7263263463973999, 0.3127478063106537, 0.2259778082370758, 0.30026933550834656, 0.13476403057575226, 0.2652139663696289, 0.27565452456474304, 0.13127312064170837, 0.07497228682041168, 0.31572288274765015, 0.0006227167323231697, 0.0019823096226900816, 0.42644765973091125, 0.0008121806895360351, 0.0007372424588538706, 0.053886860609054565, 0.009625528007745743, 0.5432632565498352, 0.5477622747421265, 0.48526614904403687, 0.3559398353099823, 0.00876493938267231, 0.0011440302478149533, 0.014674901030957699, 0.0020157722756266594, 0.04764045029878616, 0.06967776268720627, 0.010023433715105057, 0.018670888617634773, 0.0014560978161171079, 0.0965447947382927, 0.010326884686946869, 0.24848772585391998, 
                            0.0008263025665655732, 0.15702708065509796, 0.006310866214334965, 0.007129186764359474, 0.0003171146963723004, 0.1524081826210022] ,
                    borderColor	: 'rgba(124, 207, 114, 1)'
                }
                ,
                {
                    label: 'VGG-16',
                    data: [0.44247230887413025, 0.11042995750904083, 0.5107201337814331, 0.9672306776046753, 0.14794860780239105, 0.26775795221328735, 0.3802679777145386, 0.08238235116004944, 0.37777698040008545, 0.15591314435005188, 0.44288939237594604, 0.7785732746124268, 0.12951724231243134, 0.13722729682922363, 0.054192595183849335, 0.9142813682556152, 0.3018188178539276, 0.15251120924949646, 0.28593650460243225, 0.3998566269874573, 0.045773692429065704, 0.15841685235500336, 0.1423681229352951, 0.05738965794444084, 0.02965184673666954, 0.1025577038526535, 0.007505177054554224, 0.22230690717697144, 0.23317566514015198, 0.03915891796350479, 0.0049391137436032295, 0.256492555141449, 0.002938633318990469, 1.3586376905441284, 0.758669376373291, 0.07258517295122147, 0.46919405460357666, 0.6067643761634827, 0.7203720808029175, 1.0265965461730957, 1.4346401691436768, 0.034456778317689896, 0.06093870848417282, 0.5237065553665161, 0.0600925050675869, 
                        0.058332979679107666, 0.2765764594078064, 0.047385137528181076, 2.1336779594421387, 0.30566537380218506],
                    borderColor	: 'rgba(67, 112, 168, 0.8)'
                }
                ,
                {
                    label: 'Inception-V3',
                    data: [0.3313286304473877, 0.12944714725017548, 0.29826754331588745, 0.3825417757034302, 0.4088374972343445, 0.05752413347363472, 0.2643883526325226, 0.3715628683567047, 0.2552625834941864, 0.010448873043060303, 0.003831795183941722, 0.014184731990098953, 0.021528547629714012, 0.2274290770292282, 0.00478703249245882, 0.31668785214424133, 0.008532538078725338, 0.07058757543563843, 0.005503056105226278, 0.47519826889038086, 0.0007453064899891615, 0.016215387731790543, 0.03212568163871765, 0.937136709690094, 0.002974086906760931, 0.2777051329612732, 0.022556206211447716, 0.003491002134978771, 0.07570701092481613, 0.13097882270812988, 0.017431218177080154, 0.01220898237079382, 0.19685019552707672, 0.0020324070937931538, 0.0027929923962801695, 0.4281216859817505, 0.04038287326693535, 0.024910949170589447, 0.001578979892656207, 0.045037757605314255, 0.11100677400827408, 0.0005990838399156928, 0.0029082708060741425, 0.03636573627591133,
                             0.9092020392417908, 0.006351961754262447, 0.29399704933166504, 0.014396803453564644, 0.0008895883220247924, 0.7677562832832336],
                    borderColor	: 'rgba(229, 214, 6, 0.92)'
                }
                ,
                {
                    label: 'Resnet-50',
                    data: [1.226351261138916, 162.95916748046875, 5.718987464904785, 14.245723724365234, 4.690310955047607, 152.152587890625, 0.36538952589035034, 0.527590274810791, 1.3777835369110107, 1.4528359174728394, 3.0668444633483887, 1.5215885639190674, 5.042547702789307, 2.9697232246398926, 6.2950286865234375, 0.4088316559791565, 1.5513081550598145, 1.4060320854187012, 3.7770895957946777, 0.7172701954841614, 2.674483299255371, 5.76918888092041, 0.06885523349046707, 1.3075778484344482, 0.5488248467445374],
                    borderColor	: 'rgba(0, 0, 0, 0.63)'
                }
                ]
                
            },
            options: {
                title: {
                    text : 'La perte durant la validation',
                    display: true,
                    position: 'bottom'
                },

                elements: {
                    point:{
                        radius: 0
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Validation loss',
                            fontSize: 14
                        }     
                    }],
                    xAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Epochs',
                            fontSize: 14
                        }     
                    }]
                }
            }
        });
    </script>
     <script>
        var vAcc = document.getElementById('val-accuracy').getContext('2d');
        var val_acc = new Chart(vAcc, {
            type: 'line',
            scaleOverride : true,
            scaleSteps : 10,
            scaleStepWidth : 50,
            scaleStartValue : 0,
            data: {
                labels: [1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 , 12 , 13 , 14 , 15 , 16 , 17 , 18 , 19 , 20 , 21 , 22 , 23 , 24 , 25 , 26 , 27 , 28 , 29 , 30 , 31 , 32 , 33 , 34 , 35 , 36 , 37 , 38 , 39 , 40 , 41 , 42 , 43 , 44 , 45 , 46 , 47 , 48 , 49 , 50 ],
                datasets: [
                {
                    label: 'efficientNetB4',
                    data: [0.5, 0.529296875, 0.548828125, 0.732421875, 0.8203125, 0.880859375, 0.923828125, 0.869140625, 0.8984375, 0.86328125, 0.95703125, 0.958984375, 0.962890625, 0.958984375, 0.900390625, 0.998046875, 0.9609375, 0.943359375, 0.9609375, 0.947265625, 0.931640625, 0.951171875, 1.0, 0.962890625, 0.953125, 0.95703125, 0.947265625, 0.9453125, 0.958984375, 0.982421875, 0.96875, 0.978515625, 0.947265625, 0.88671875, 0.9375, 0.994140625, 0.9609375, 0.94140625, 0.9453125, 0.990234375, 0.95703125, 
                            0.966796875, 0.978515625, 0.951171875, 0.955078125, 0.939453125, 0.9921875, 0.994140625, 0.962890625, 0.990234375],
                    borderColor	: 'rgba(152, 22, 56, 0.7)'
                }
                ,
                {
                    label: 'MobileNet-V2',
                    data: [0.58984375, 0.548828125, 0.56640625, 0.7109375, 0.646484375, 0.763671875, 0.830078125, 0.650390625, 0.66015625, 0.69140625, 0.724609375, 0.78515625, 0.900390625, 0.8984375, 0.919921875, 0.943359375, 0.91015625, 0.966796875, 0.9453125, 0.958984375, 0.94140625, 0.98046875, 0.966796875, 0.8671875, 0.9921875, 0.990234375, 0.931640625, 0.97265625, 0.900390625, 0.91796875, 0.896484375, 0.8828125, 0.9921875, 0.99609375, 0.978515625, 0.998046875, 0.9453125, 0.974609375, 0.986328125, 0.998046875, 0.9765625, 
                            0.974609375, 0.955078125, 0.982421875, 0.974609375, 0.982421875, 0.970703125, 0.978515625, 0.990234375, 0.958984375],
                    borderColor	: 'rgba(124, 207, 114, 1)'
                }
                ,
                {
                    label: 'VGG-16',
                    data: [0.802734375, 0.904296875, 0.685546875, 0.599609375, 0.865234375, 0.91015625, 0.818359375, 0.962890625, 0.833984375, 0.962890625, 0.8203125, 0.70703125, 0.873046875, 0.990234375, 0.916015625, 0.65625, 0.880859375, 0.9765625, 0.9296875, 0.908203125, 0.984375, 0.8984375, 0.92578125, 0.947265625, 0.986328125, 0.9609375, 0.990234375, 0.896484375, 0.896484375, 0.9453125, 0.958984375, 0.8828125, 0.943359375, 0.73828125, 0.71875, 0.9609375, 0.720703125, 0.720703125, 0.84765625, 0.79296875, 0.734375, 0.98046875,
                             0.97265625, 0.84375, 0.8671875, 0.98046875, 0.875, 0.982421875, 0.533203125, 0.83203125],
                    borderColor	: 'rgba(67, 112, 168, 0.8)'
                }
                ,
                {
                    label: 'Inception-V3',
                    data: [0.856249988079071, 0.9662500023841858, 0.8862500190734863, 0.8812500238418579, 0.9662500023841858, 0.9762499928474426, 0.9487500190734863, 0.831250011920929, 0.9387500286102295, 0.9962499737739563, 0.9787499904632568, 0.9837499856948853, 0.9700000286102295, 0.9624999761581421, 0.9962499737739563, 0.9487500190734863, 0.96875, 0.9975000023841858, 0.9862499833106995, 0.9049999713897705, 0.9900000095367432, 0.9587500095367432, 0.9775000214576721, 0.8349999785423279, 0.9712499976158142, 0.9825000166893005, 0.9900000095367432, 1.0, 0.987500011920929, 0.9262499809265137, 0.9800000190734863, 0.9837499856948853, 0.9737499952316284, 0.9862499833106995, 0.9975000023841858, 0.9649999737739563, 0.981249988079071, 0.9674999713897705, 0.9412500262260437, 0.9612500071525574, 0.9574999809265137, 0.9762499928474426, 0.9862499833106995, 0.9887499809265137, 0.8512499928474426, 
                            0.9962499737739563, 0.9175000190734863, 0.9987499713897705, 0.9937499761581421, 0.9075000286102295],
                    borderColor	: 'rgba(229, 214, 6, 0.92)'
                }
                ,
                {
                    label: 'Resnet-50',
                    data: [0.5, 0.5, 0.5, 0.5, 0.5, 0.5, 0.779296875, 0.677734375, 0.708984375, 0.607421875, 0.546875, 0.62890625, 0.5, 0.552734375, 0.5, 0.8828125, 0.513671875, 
                            0.701171875, 0.66015625, 0.80859375, 0.689453125, 0.5390625, 0.8984375, 0.7265625, 0.908203125],
                    borderColor	: 'rgba(0, 0, 0, 0.63)'
                }
                ]
                
            },
            options: {
                title: {
                    text : 'La justesse durant la validation',
                    display: true,
                    position: 'bottom'
                },

                elements: {
                    point:{
                        radius: 0
                    }
                },
                scales: {
                    yAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Validation Accuracy',
                            fontSize: 14
                        }     
                    }],
                    xAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Epochs',
                            fontSize: 14
                        }     
                    }]
                }
            }
        });
    </script>
    <script>
        var test = document.getElementById('bar-chart').getContext('2d');
        var test1 = new Chart(test, {
            type: 'bar',
            data: {
                labels: ['VGG-16','Inception-V3','MobileNet-V2','EfficientNet-B4','ResNet-50'],
                datasets: [
                {
                    label: 'Justesse',
                    data: [0.9215,0.9375,0.9327,0.9327,0.9279],
                    backgroundColor	: 'rgba(255, 77, 77, 1)'
                },
                {
                    label: 'F1-score',
                    data: [0.9366 , 0.9502 , 0.9483 , 0.9467 , 0.9419],
                    backgroundColor	: 'rgba(72, 157, 57, 1)'
                }
                ]
                
            },
            options: {
                title: {
                    text : 'Comparaison entre les résultats des différents modèles',
                    display: true,
                    position: 'bottom'
                },
                scales: {
                    yAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Valeur F1-score / justesse',
                            fontSize: 14
                        },
                        ticks: {
                            suggestedMin: 0.915,
                            suggestedMax: 0.96
                        }     
                    }],
                    xAxes: [{
                        scaleLabel:{
                            display: true,
                            labelString: 'Modèle',
                            fontSize: 14,
                        },
                        categoryPercentage: 0.5,
                        barPercentage: 1     
                    }]
                },
                legend: {
                    labels: {
                        fontSize: 18
                    }
                }
            }
        });
    </script>
@endsection