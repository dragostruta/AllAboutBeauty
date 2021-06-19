<div class="container mt-100 mt-60">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
            <img src="${myList[i].path}" class="img-fluid shadow rounded" alt="">
        </div>

        <div class="col-lg-6 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="section-title ms-lg-5">
                <h4 class="title mb-4">${myList[i].name}</h4>
                <ul class="list-unstyled text-muted" style="margin-bottom: 0px">
                    <li class="mb-0">${myList[i].description}</li>
                    <li class="mb-0">${myList[i].city}</li>
                    <li class="mb-0">${myList[i].address}</li>
                </ul>
                <div>
                    <fieldset class="rating" id="${myList[i].id}" style="width: 56%">
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-5" id="star5" name="rating" value="5" />
                        <label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-4-5" id="star4half" name="rating" value="4.5" />
                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-4" id="star4" name="rating" value="4" />
                        <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-3-5" id="star3half" name="rating" value="3.5" />
                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-3" id="star3" name="rating" value="3" />
                        <label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-2-5" id="star2half" name="rating" value="2.5" />
                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-2" id="star2" name="rating" value="2" />
                        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-1-5" id="star1half" name="rating" value="1.5" />
                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-1" id="star1" name="rating" value="1" />
                        <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" data-parent="${myList[i].id}" class="rating-star salon-${myList[i].id}-star-0-5" id="starhalf" name="rating" value="0.5" />
                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div>
                <p class="text-muted">Program: 08:00 - 16:00</p>
                <a href="/login" class="mt-3 h6 text-primary">Crează o programare <i class="uil uil-angle-right-b"></i></a>
            </div>
        </div>
    </div>
</div>
