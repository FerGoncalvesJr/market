
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        <meta value="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
        <title>Sales Store</title>
        <style>
        [v-cloak] {
            display: none;
        }
        </style>
    </head>
    <body class="bg-light">
        <div class="container" id="app" v-cloak>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex d-flex justify-content-between">
                                <div class="lead">SALES</div>
                                <button id="show-btn" @click="showModal('my-modal')" class="btn btn-primary">Add Sale</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-muted lead text-center" v-if="!sales.length">No sales found</div>
                            <div class="table table-success table-striped" v-if="sales.length">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>value</th>
                                            <th>tax</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(sale, i) in sales" :key="sale.id">
                                            <td>{{sale.id}}</td>
                                            <td>{{sale.value}}</td>
                                            <td>{{sale.tax}}</td>
                                            <td>
                                                <a href="#" @click.prevent="deleteSale(sale.id)" class="btn btn-danger">Delete</a>
                                                <a href="#" @click.prevent="editSale(sale.id)" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    
                    <!-- Add sales Modal -->
                    <b-modal ref="my-modal" hide-footer title="Add sales">
                        <form action="" @submit.prevent="onSubmit">
                            <div class="form-group">
                                <label for="">Value</label>
                                <input type="text" v-model="value" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tax</label>
                                <input type="tax" v-model="tax" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-outline-info">Add sales</button>
                            </div>
                        </form>
                        <b-button class="mt-3" variant="outline-danger" block @click="hideModal('my-modal')">Close Me</b-button>
                    </b-modal>
                            
                    <!-- Update sale Modal -->
                    <div>
                        <b-modal ref="my-modal1" hide-footer title="Update sale">
                            <div>
                                <form action="" @submit.prevent="onUpdate">
                                    <div class="form-group">
                                        <label for="">value</label>
                                        <input type="text" v-model="edit_value" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tax</label>
                                        <input type="tax" v-model="edit_tax" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-outline-info">Update sale</button>
                                    </div>
                                </form>
                            </div>
                            <b-button class="mt-3" variant="outline-danger" block @click="hideModal('my-modal1')">Close Me</b-button>
                        </b-modal>
                    </div>
                </div>
            </div>
    
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
        <!-- BootstrapVue js -->
        <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
        <!-- Axios -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>