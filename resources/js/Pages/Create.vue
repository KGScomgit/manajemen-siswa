<template>
    <div>
    <h2>Tambah Siswa</h2>
        <form @sumbit.prevent="createData">
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
            <button class="btn btn-primary">Simpan</button>
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
                }
            }
        },
        methods:{
            createData(){
                this.$inertia.post('/siswa', this.form);
            }
        }
    };
</script>