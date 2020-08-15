# Pneumonia Detection using Transfer Learning

## Abstract
Pneumonia is a potentially fatal bacterial or viral lung infection. It can be caused
by viruses, bacteria or fungi. Depending on the germ involved, they can be mild
or, on the contrary, very serious. A chest x-ray is necessary for the diagnosis of
pneumonia, sometimes the anatomical lesions are insufficiently radiopaque to be
recognized with the naked eye that makes one of the objectives of our work is to
explore the possibilities of artificial intelligence to improve accuracy, optimize
and facilitate the pneumonia screening process. We prepared five different
models and analyzed their performance, most of the models reached high
accuracy. The best results were given by an Inception-V3 based model, it reached
95% accuracy, 95% precision and 94% recall on unseen data from the Guangzhou
Women and Children’s Medical Center dataset.
<p align="center"><img src="https://image.flaticon.com/icons/svg/2103/2103787.svg" width="400"></p>


## Welcome
This website is for the time being only for visualing the models trainig results, in future the option to train the models will be available !.
to launch the server just entre project server using a terminal and write: 
`php artisan serve`
then open the browser and go to http://localhost:8000/
and you're good to go ! 

## CNN MODELS
- **VGG16**
	-
	- **Accuarcy:**  0.9214743375778198
	- **Loss:** 0.2492460459470749
	- 
- **RESNET-50**
	-
	- **Accuarcy:** 0.9278846383094788
	- **Loss:**  0.46026670932769775
	
- **MOBILENET-V2**
	-
	- **Accuarcy:**  0.932692289352417
	- **Loss:** 0.003278044518083334
	
- **INCEPTION-V3**
	-
	- **Accuarcy:** 0.9375 
	- **Loss:**0.15788577497005463
	
- **EFFICENTNET-B4**
	-
	- **Accuarcy:** 0.932692289352417
	- **Loss:** 0.0006643453380092978
	
