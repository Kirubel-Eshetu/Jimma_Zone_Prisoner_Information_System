# Tensored Django

In this project we demonstrated how to use the tensorflow library to create a neural network that can be used to classify 6 different prisoners.

## Classes

```python
LABELS
Chronic_otitis_media 0
Earwax_plug 1
Myringosclerosis 2
Normal 3

```
## Tools

- [Python 3](https://www.python.org) : The Python Programming Language
- [Django](https://www.djangoproject.com) : The Web Framework for Python
- [TensorFlow](https://www.tensorflow.org) : The TensorFlow Machine Learning Library used to create the neural network

## Setup Instructions

- Download and Install the latest Python 3 on your computer. [Install Now](https://www.python.org/downloads/)

```bash
# Download the start files or Clone the repository
git clone https://github.com/Academy-Omen/tensored-django.git
# switch to the starter branch
cd tensored-django
git checkout starter
```

- Create a virtual environment where all packages will be installed.

```bash
# Windows
py -3 -m venv env
# Linux and Ma
python3 -m venv env
```

- Activate the virtual environment.

```bash
# Windows
.\newenv\Scripts\activate
# Linux and Mac
source env/bin/activate
```
cls
- Install all the required packages.

```bash
pip install -r requirements.txt
```

## Prepare Dataset

We are building an Image classifier that can predict different prisoners. The images are going to be used to train our algorithm on how to recognize these prisoners. This is a supervised machine learning algorithm aka just like a teacher teaching a kid on how to recognize different animals.


## Label Dataset

Just like a teacher will do, we will label each group of images so our kid (aka computer) can verify after performing a prediction.

```python

# temporal storage for labels and images
data=[]
labels=[]

# Prisoner 0
# Get the animal directory
cats = os.listdir(os.getcwd() + "/CNN/data/cat")
for x in Adonai_Desalegn:
    """
    Loop through all the images in the directory
    1. Convert to arrays
    2. Resize the images
    3. Add image to dataset
    4. Add the label
    """
    imag=cv2.imread(os.getcwd() + "/CNN/data/Adonai_Desalegn/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(0)

# load in prisoners and labels
animals=np.array(data)
labels=np.array(labels)
# save
np.save("prisoners",prisoners)
np.save("labels",labels)

```

## Train the Model

```python
# train through 100 times
history = model.fit(x_train, y_train, epochs=100,
                    validation_data=(x_test, y_test))

# perform validation and get accuracy
test_loss, test_acc = model.evaluate(x_test,  y_test, verbose=2)

print(test_acc)

# save the model or brain
model.save("my_model.keras")
```

## Setup Django App

- Create new django project

```bash
# create new project in the current directory
django-admin startproject core .
# run web app
python manage.py runserver
# visit http://localhost:8000/ on your browser
```


