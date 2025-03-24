<template>
    <div class="container">
    <h2>Tambah Siswa</h2>
        <form @submit.prevent="createData">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input v-model="form.nama" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nis</label>
                <input v-model="form.nis" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input v-model="form.kelas" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input v-model="form.jurusan" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input v-model="form.alamat" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input @change="handleFileUpload" accept="image/*" type="file" class="form-control" required>
            </div>

            <button type="sumbit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                form:{
                    nama: "",
                    nis: "",
                    kelas: "",
                    jurusan: "",
                    alamat: "",
                    image: null
                }
            }
        },
        methods:{
            createData(){
                this.$inertia.post('/siswa', this.form);
            },
            handleFileUpload(event){
                this.form.image = event.target.files[0];
            }
        }
    };
</script>