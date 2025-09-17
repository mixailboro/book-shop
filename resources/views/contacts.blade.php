
<x-app-layout>
    <section class="wn_contact_area bg--white pt--80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="contact-form-wrap">
                        <h2 class="contact__title">Book Shop</h2>
                        <p>Добро пожаловать,любители книг и кофе! работаем для вас 24/7! </p>
                    </div>
                    <div class="wn__address">
                        <div class="wn__addres__wreapper">

                            <div class="single__address">
                                <i class="icon-location-pin icons"></i>
                                <div class="content">
                                    <span>address:</span>
                                    <p>{{ $contact->address }}</p>
                                </div>
                            </div>

                            <div class="single__address">
                                <i class="icon-phone icons"></i>
                                <div class="content">
                                    <span>Phone Number:</span>
                                    <p>{{ $contact->phone }}</p>
                                </div>
                            </div>

                            <div class="single__address">
                                <i class="icon-envelope icons"></i>
                                <div class="content">
                                    <span>Email address:</span>
                                    <p>{{ $contact->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt--80">
            <script
                type="text/javascript"
                charset="utf-8"
                async
                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Az-aurtWdfnBdw-ySw8j837MhRcCcctpa&amp;height=480&amp;lang=ru_RU&amp;scroll=true"
            >
            </script>
        </div>
    </section>
</x-app-layout>
