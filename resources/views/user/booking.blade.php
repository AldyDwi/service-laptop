<x-user>
    <div class="py-12 min-h-screen text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="font-bold text-xl mb-10">
                    <h1>Booking Service</h1>
                </div>
                <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex justify-start items-start">
                        <div class="md:w-2/5">
                            <!-- Pilihan kategori -->
                            <div class="mb-4">
                                <label for="category_id">Kategori</label><br>
                                <select name="category_id" id="category_id" class="select select-bordered w-full max-w-md mt-1 bg-white" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <!-- Merek Laptop -->
                            <div class="form-group mb-4">
                                <label for="laptop_brand">Merk Laptop</label><br>
                                <input type="text" name="laptop_brand" id="laptop_brand" placeholder="Type here" class="input input-bordered w-full max-w-md mt-1 bg-white" required>
                            </div>
                    
                            <!-- Tipe Laptop -->
                            <div class="form-group mb-4">
                                <label for="laptop_type">Tipe Laptop</label><br>
                                <input type="text" name="laptop_type" id="laptop_type" placeholder="Type here" class="input input-bordered w-full max-w-md mt-1 bg-white" required>
                            </div>
                    
                            <!-- Deskripsi Masalah -->
                            <div class="form-group mb-4">
                                <label for="problem_description">Deskripsi Masalah</label><br>
                                <textarea name="problem_description" id="problem_description" placeholder="Type here" class="textarea textarea-bordered w-full max-w-md mt-1 bg-white" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="md:w-3/5 md:pl-5">
                            <!-- Tanggal Booking -->
                            <div class="form-group mb-4">
                                <label for="booking_date">Tanggal Booking</label><br>
                                <input type="date" name="booking_date" id="booking_date" placeholder="Type here" class="input input-bordered w-full max-w-md mt-1 bg-white text-gray-900" required>
                            </div>
                    
                            <!-- Catatan -->
                            <div class="form-group mb-4">
                                <label for="notes">Catatan (opsional)</label><br>
                                <textarea name="notes" id="notes" placeholder="Type here" class="textarea textarea-bordered w-full max-w-md mt-1 bg-white" rows="3"></textarea>
                            </div>
                    
                            <!-- Unggah Gambar -->
                            <div class="form-group mb-4">
                                <label for="images">Upload Gambar</label><br>
                                <input type="file" name="images[]" id="images" class="file-input file-input-bordered w-full max-w-md mt-1 bg-white" multiple>
                            </div>
                        
                            <button type="submit" class="btn btn-ghost bg-cyan-500 text-white rounded-md text-base hover:bg-cyan-600">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-user>