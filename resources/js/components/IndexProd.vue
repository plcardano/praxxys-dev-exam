<template>
    <div>
        <h1>View Products</h1>
        
        <button class="btn btn-primary mb-3 mt-3" @click="createPage">Create Product</button>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr v-for="item in productList" :key="item.id">
                                <td>{{ item.name }}</td>
                                <td>{{ item.category }}</td>
                                <td>{{ item.description }}</td>
                                <td>{{ item.date }}</td>
                                <td class="text-center">
                                    <button class="btn btn-secondary" @click="edit(item)"><i class="fa fa-edit"></i></button>

                                </td>
                            </tr>
                        </tbody>
                    </table>            
                </div>
            </div>
        </div>

        <!-- EDIT MODAL -->
        <div class="modal" tabindex="1" id="editModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <label for="name">Product name:</label>
                            <input type="text" class="form-control" v-model="formEdit.name">
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control" v-model="formEdit.category">
                                <option disabled selected>choose category</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>    
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <ckeditor v-model="formEdit.description" tag-name="textarea"></ckeditor>
                        </div>   

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="datetime-local" name="date" class="form-control" v-model="formEdit.date">
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="save()">Save changes</button>
                </div>
                </div>
            </div>
        </div>
                           
                            
    </div>
</template>

<script>

export default {
    props: ['product'],
    data() {
        return {
            productList: this.product,
            formEdit: {
                 name: "",
                 category: "",
                 description: "",
                 date: "",
                 
            },
            selectedId: '',
        }
    },
    methods: {
        createPage() {
            window.location.href='/products/create';
        },
        edit(item) {
            $('#editModal').modal('show');
            this.formEdit.name = item.name;
            this.formEdit.category = item.category;
            this.formEdit.description = item.description;
            this.formEdit.date = item.date;
            this.selectedId = item.id;
        },
        save() {
            const vm = this;
            axios.put(`/products/${vm.selectedId}`, this.formEdit)
            .then(function (response) {
                alert('Successfully saved')
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            })
        }
    }
}
</script>
