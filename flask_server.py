# %%


import numpy as np
from numpy import float32



# Callbacks
## Keep the best model


from flask import Flask, request

app = Flask(__name__)


# ----------------------------------------Here is the call---------------------------------------
@app.route('/train', methods=['POST'])
def train():
    print("hello1")
    epoch = request.form['epoche']
    step_epoch = request.form['step_epoch']
    optimizer_type = request.form['optimizer']
    loss_function = request.form['loss_function']
    learning_rate = request.form['learning_rate']
    print(epoch + " " + step_epoch + " " + optimizer_type + " " + loss_function + " " + learning_rate)

    targetx = 224
    targety = 224
    batch_size = 32

    # Directories
    input_dir = './chest_xray'
    train_dir = input_dir + "/train"
    val_dir = input_dir + "/val"
    test_dir = input_dir + "/test"

    from keras.applications.mobilenet_v2 import MobileNetV2
    from keras.preprocessing import image
    from keras.models import Model
    from keras.layers import Dense, GlobalAveragePooling2D, Dropout, BatchNormalization, Flatten
    from keras import backend as K
    from keras.callbacks import ReduceLROnPlateau, ModelCheckpoint
    from keras.optimizers import Adam, RMSprop

    base_model = MobileNetV2(include_top=False, weights='imagenet', input_shape=(targetx, targety, 3))

    # base_model.trainable = False

    x = base_model.output
    x = GlobalAveragePooling2D()(x)
    x = Dropout(0.5)(x)
    x = Dense(128, activation='relu')(x)
    x = Dropout(0.2)(x)
    x = BatchNormalization()(x)
    predictions = Dense(1, activation='sigmoid')(x)

    global model
    model = Model(inputs=base_model.input, outputs=predictions)

    from keras.preprocessing.image import ImageDataGenerator

    image_datagen = ImageDataGenerator(rescale=1 / 255,
                                       zoom_range=0.1,
                                       horizontal_flip=True,
                                       width_shift_range=0.2,
                                       height_shift_range=0.2)
    training_set = image_datagen.flow_from_directory(
        train_dir,
        target_size=(targetx, targety),
        batch_size=batch_size,
        class_mode='binary')
    val_set = image_datagen.flow_from_directory(
        val_dir,
        target_size=(targetx, targety),
        batch_size=batch_size,
        class_mode='binary')

    mc_loss = ModelCheckpoint('model-mobileNetV2-loss.hdf5',
                              save_best_only=True,
                              verbose=1,
                              monitor='val_loss',
                              mode='min')
    mc_acc = ModelCheckpoint('model-mobileNetV2-acc.hdf5',
                             save_best_only=True,
                             verbose=0,
                             monitor='val_accuracy',
                             mode='max')

    optimizer = Adam(lr=float(learning_rate))
    # compile the model (should be done *after* setting layers to non-trainable)

    print("hello3")
    model.compile(optimizer=optimizer, loss=loss_function, metrics=['accuracy'])
    print("hello4")

    # train the model on the new data for a few epochs
    history = model.fit_generator(
        training_set,
        steps_per_epoch=int(step_epoch),
        epochs=int(epoch),
        validation_data=val_set,
        validation_steps=32,
        callbacks=[mc_acc, mc_loss])

    print("hello5")
    return "Le modèle est entrainé avec succés"


@app.route('/')
def hello_world():
    return 'Hello, World!'


@app.route('/shit', methods=['GET'])
def shit():
    return "shit!"


if __name__ == "__main__":
    print(("* Loading Keras model and Flask starting server..."
           "please wait until server has fully started"))
    app.run(port=5001)
