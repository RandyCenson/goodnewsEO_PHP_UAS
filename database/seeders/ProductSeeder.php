<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // for ($i = 1; $i <= 6; $i++) {
        //     Product::create([
        //         "product_name" => "Product $i",
        //         "orientation" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci porro debitis eius deserunt odio, repudiandae ad repellendus laboriosam nobis sed?",
        //         "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem temporibus, pariatur, tempore quia officiis at repudiandae dolore assumenda sunt fugiat alias illo nam minus autem dolor voluptate. Dignissimos eum natus ipsum optio neque numquam, voluptatem autem! Officiis, voluptas. Dolorum atque minima, aliquam facilis minus exercitationem aliquid doloremque vero, error qui consequatur quas tempore aspernatur asperiores cupiditate similique? Eius esse excepturi repellat deleniti, asperiores quas magni! Labore facere dicta expedita natus quisquam eaque, aspernatur minima quas nobis mollitia soluta sed id incidunt consequatur recusandae. Asperiores distinctio cum recusandae, odit earum quod vero similique assumenda? Autem perferendis ipsa accusamus id eaque. Sapiente!",
        //         "price" => rand(5000, 30000),
        //         "stock" => rand(10, 100),
        //         "discount" => 0.05,
        //         "image" => env("IMAGE_PRODUCT"),
        //     ]);
        // }
        // gaamRDJEO5xNbQMfgSXx91ZNIVYxid2S110yVkKg.jpg

        Product::create([
            "product_name" => "Wedding Planning",
            "orientation" => "Wujudkan pernikahan impian Anda dengan layanan wedding planning kami yang komprehensif dan personal. Kami hadir untuk membantu Anda setiap langkah dalam perjalanan menuju hari spesial Anda?",
            "description" => "Kami memahami bahwa pernikahan adalah salah satu momen paling penting dalam hidup Anda. Tim kami yang berpengalaman akan membantu mewujudkan pernikahan impian Anda dengan perencanaan yang detail dan eksekusi yang sempurna. Mulai dari pemilihan tema, dekorasi, katering, hingga hiburan, kami akan memastikan setiap aspek pernikahan Anda berjalan lancar dan indah. Dengan layanan personalisasi yang lengkap, kami akan bekerja sama dengan Anda untuk menciptakan pernikahan yang unik dan tak terlupakan.",
            "price" => 50000,
            "stock" => 120,
            "discount" => 5,
            "image" => "product/gaamRDJEO5xNbQMfgSXx91ZNIVYxid2S110yVkKg.jpg",
        ]);

        Product::create([
            "product_name" => "General Event Planning",
            "orientation" => "Sukseskan setiap acara Anda dengan layanan event planning profesional kami. Dari acara perusahaan hingga pertemuan sosial, kami siap mengelola semua aspek acara Anda dengan sempurna",
            "description" => "Apapun jenis acara yang Anda rencanakan, kami siap membantu Anda menciptakan pengalaman yang luar biasa. Baik itu acara perusahaan, seminar, pameran, atau pertemuan sosial, tim kami yang profesional akan mengelola semua aspek acara Anda. Kami menawarkan solusi lengkap dari perencanaan, koordinasi, hingga pelaksanaan acara, memastikan semuanya berjalan sesuai rencana dan melebihi ekspektasi Anda. Dengan layanan yang fleksibel dan adaptif, kami berkomitmen untuk memberikan hasil terbaik untuk setiap acara yang kami tangani",
            "price" => 35000,
            "stock" => 60,
            "discount" => 0,
            "image" => "product/r8e0iS6hEBocNNBRkmTy5uL7BUf9IjNSQmZrgKJy.jpg",
        ]);

        Product::create([
            "product_name" => "Birthday Party Planning",
            "orientation" => "Rayakan momen istimewa Anda dengan pesta ulang tahun yang penuh kesan. Kami menawarkan berbagai paket yang dapat disesuaikan untuk menciptakan kenangan tak terlupakan bagi Anda dan orang-orang tercinta",
            "description" => "Rayakan hari istimewa Anda dengan pesta ulang tahun yang penuh kegembiraan dan kenangan manis. Kami menawarkan berbagai paket ulang tahun yang dapat disesuaikan dengan keinginan dan tema yang Anda inginkan. Dari pesta anak-anak yang penuh warna dan keceriaan hingga perayaan ulang tahun dewasa yang elegan, kami akan mengurus semua detail termasuk dekorasi, hiburan, dan makanan, sehingga Anda dapat menikmati momen berharga bersama keluarga dan teman-teman tanpa khawatir.",
            "price" => 55000,
            "stock" => 70,
            "discount" => 10,
            "image" => "product/Gy6UVqa000obrsMGJaRAzZ4hWEz5WGhu38QawLzC.jpg",
        ]);
    }
}
