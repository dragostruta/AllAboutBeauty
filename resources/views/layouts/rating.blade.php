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
                    <div id="full-stars-example">
                        <div class="rating-group" id="${myList[i].id}">
                            <label aria-label="1 star" class="rating__label" for="rating-1-${myList[i].id}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating-${myList[i].id}" id="rating-1-${myList[i].id}" value="1" type="radio">
                            <label aria-label="2 stars" class="rating__label" for="rating-2-${myList[i].id}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating-${myList[i].id}" id="rating-2-${myList[i].id}" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating-3-${myList[i].id}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating-${myList[i].id}" id="rating-3-${myList[i].id}" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating-4-${myList[i].id}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating-${myList[i].id}" id="rating-4-${myList[i].id}" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating-5-${myList[i].id}"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating-${myList[i].id}" id="rating-5-${myList[i].id}" value="5" type="radio">
                        </div>
                    </div>
                </div>
                <p class="text-muted">Program: 08:00 - 16:00</p>
                <a href="/login" class="mt-3 h6 text-primary">Crează o programare <i class="uil uil-angle-right-b"></i></a>
            </div>
        </div>
    </div>
</div>
