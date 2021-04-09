<template>
    <div class="container">


        <div class="appContainer">
            <div class="breedsCategories">

                <h2>Breeds</h2>

                <div class="breedsCategories">
                    <ul>
                        <li>
                            <div class="breed">
                                <span @click="selectBreed()">random</span>
                            </div>
                        </li>
                        <li v-for="breed in this.breeds">
                            <div class="breed" type="submit" @click="selectBreed(breed)">
                                <span>{{breed}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="breedsSection">
                <div class="imgContainer">

                    <h2>Breed image</h2>

                    <div class="breedsImg">
                        <img :src="this.imgBreeds" :alt="this.selectedBreed">
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
/**
 * I decided to use just one vue component and put all the css rules here to make them easier to read;
 * but using vue + vuex will probably be the best way to build up a more complex app.
 */
export default {
    data(){
        return{
            breeds:'',
            selectedBreed: '',
            imgBreeds:'',
            allBreeeds: 'https://dog.ceo/api/breeds/list',
            randomDog: `https://dog.ceo/api/breeds/image/random`,
        }
    },
    methods: {

        /**
         * This function will allow me to get all the breeds name shown in the breedsCategories div
         */
        obtainAllBreeds() {
            // Promising
            fetch(this.allBreeeds)
            // now im going to make a simple json file, easy to work with
            .then(response =>  response.json())
            // at this point i have just to record all the info i have collected
            .then(resp => {
                resp = resp.message;
                this.breeds = resp;
            })
            .catch(error => {
            console.log(error);
            });
        },
        
        /**
         * This function will take one random picture from the selected breed
        */
        selectBreed(item) {
           //this simple if/else condition will slect the dog img
            if (!item) {
                // the first condition just select a random img when the user press the random element in breedsCategories div
                fetch(this.randomDog)
                .then(response => response.json())
                .then(resp => {
                    resp = resp.message;
                    this.imgBreeds = resp;
                    this.selectedBreed = 'random image';
                })
                .catch(error => {
                    console.log(error);
                });
            } else {
                /**
                 * the else select a specfic breed img when the user select one breed from the elements in breedsCategories div
                 * now the argument will help us to salect the correct breed the user selected before
                 */
                fetch(`https://dog.ceo/api/breed/${item}/images/random`)
                .then(response => response.json())
                .then(resp => {
                    resp = resp.message;
                    this.imgBreeds = resp;
                    this.selectedBreed = item;
                })
                .catch(error => {
                    console.log(error);
                });
            };
        },
    },
    mounted() {
        this.obtainAllBreeds();
        this.selectBreed();
    }
}
</script>

<style scoped lang="scss">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Nunito', sans-serif;
}

.container{
    width: 100%;
    margin-top: 30px;
    margin-left: 20px;
    .appContainer{
        display: flex;
        .breedsCategories{
            width: 25%;
        }
        .breedsSection{
            width: 75%;
            .imgContainer{
                position: sticky;
                top: 15px;
                .breedsImg{
                    img{
                        max-height: 750px;
                    }
                }
            }
        }
    }
}
ul{
    list-style: none;
    cursor: pointer;
    padding-left: 0;
    li{
        margin: 25px 0;
        display: flex;
        .breed{
            text-transform: capitalize;
            border: 1px solid transparent;
            border-radius: 10px;
            background-color: whitesmoke;
            padding: 10px;
        }
        :hover{
            background-color: green;
        }
    }
}
</style>