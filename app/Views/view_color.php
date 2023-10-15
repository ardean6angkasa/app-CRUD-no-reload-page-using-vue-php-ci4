<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link href="/css/font.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="/css/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>

<body>
    <div id="app">
        <v-app>
            <v-main>
                <v-container>
                    <!-- Table List Product -->
                    <template>
                        <!-- Button Add New Product -->
                        <template>
                            <v-btn color="primary" dark @click="modalAdd = true">Add New</v-btn>
                        </template>
                        <a href="<?= base_url('/'); ?>">
                            <v-btn color="success">Kode Produk</button>
                        </a>

                        <a href="<?= base_url('/index3'); ?>">
                            <v-btn color="success">Produk</button>
                        </a>


                        <v-simple-table>
                            <template v-slot:default>
                                <thead>
                                    <tr>
                                        <th class="text-left">Kode Warna</th>
                                        <th class="text-left">Nama Warna</th>
                                        <th class="text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="home in products" :key="home.kode_warna">
                                        <td>{{ home.kode_warna }}</td>
                                        <td>{{ home.nama_warna }}</td>
                                        <td>
                                            <template>
                                                <v-icon small class="mr-2" @click="editItem(home)">
                                                    mdi-pencil
                                                </v-icon>
                                                <v-icon small @click="deleteItem(home)">
                                                    mdi-delete
                                                </v-icon>
                                            </template>

                                        </td>
                                    </tr>
                                </tbody>
                            </template>
                        </v-simple-table>

                    </template>
                    <!-- End Table List Product -->

                    <!-- Modal Save Product -->
                    <template>
                        <v-dialog v-model="modalAdd" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Add New Product</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12">
                                                <v-text-field label="Color Code*" v-model="colorCode" required>
                                                </v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field label="Color Name*" v-model="colorName" required>
                                                </v-text-field>
                                            </v-col>
                                        </v-row>



                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="modalAdd = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="saveProduct">Save</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </template>
                    <!-- End Modal Save Product -->

                    <!-- Modal Edit Product -->
                    <template>
                        <v-dialog v-model="modalEdit" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Edit Product</span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>

                                            <v-col cols="12">
                                                <v-text-field label="Color*" v-model="colornameEdit" required>
                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="modalEdit = false">Close</v-btn>
                                    <v-btn color="blue darken-1" text @click="updateProduct">Update</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </template>
                    <!-- End Modal Edit Product -->

                    <!-- Modal Delete Product -->
                    <template>
                        <v-dialog v-model="modalDelete" persistent max-width="600px">
                            <v-card>
                                <v-card-title>
                                    <span class="headline"></span>
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <h3>Are sure want to delete <strong>"{{ productColorDelete }}"</strong> ?
                                            </h3>
                                        </v-row>
                                    </v-container>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="modalDelete = false">No</v-btn>
                                    <v-btn color="info darken-1" text @click="deleteProduct">Yes
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </template>
                    <!-- End Modal Delete Product -->

                </v-container>
            </v-main>
        </v-app>
    </div>

    <!-- Load File Vue js CDN -->
    <script src="/js/vue.js"></script>
    <script src="/js/vuetify.js"></script>
    <script src="/js/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                products: [],
                modalAdd: false,
                colorCode: '',
                colorName: '',
                modalEdit: false,
                productIdEdit: '',
                colornameEdit: '',
                modalDelete: false,
                productIdDelete: '',
                productColorDelete: '',
            },
            created: function () {
                axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                this.getProducts();
            },
            methods: {
                // Get Product
                getProducts: function () {
                    axios.get('/getcolor')
                        .then(res => {
                            // handle success
                            this.products = res.data;
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                },
                // Save Product
                saveProduct: function () {
                    axios.post('/save2', {
                        kode_warna: this.colorCode,
                        nama_warna: this.colorName
                    })
                        .then(res => {
                            // handle success
                            this.getProducts();
                            this.colorCode = '';
                            this.colorName = '';
                            this.modalAdd = false;
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                },

                // Get Item Edit Product
                editItem: function (home) {
                    this.modalEdit = true;
                    this.productIdEdit = home.kode_warna;
                    this.colornameEdit = home.nama_warna;
                },

                //Update Product
                updateProduct: function () {
                    axios.post('/update2', {
                        nama_warna: this.colornameEdit,
                        id: this.productIdEdit
                    })
                        .then(res => {
                            // handle success
                            this.getProducts();
                            this.modalEdit = false;
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                },

                // Get Item Delete Product
                deleteItem: function (home) {
                    this.modalDelete = true;
                    this.productIdDelete = home.kode_warna;
                    this.productColorDelete = home.nama_warna;
                },

                // Delete Product
                deleteProduct: function () {
                    axios.post('/delete2',
                        {
                            id: this.productIdDelete
                        })
                        .then(res => {
                            // handle success
                            this.getProducts();
                            this.modalDelete = false;
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                }

            },
        })
    </script>
</body>

</html>