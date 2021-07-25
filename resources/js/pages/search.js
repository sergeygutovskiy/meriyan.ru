import axios from 'axios';


let active_tags = [];
let active_seasons = [];
let active_complexities = [];
let min_price = null;
let max_price = null;
let is_discount = true;


const search_form = document.getElementById('search-form');
const tours = document.getElementById('tours').childNodes[1];

const loading_container = document.getElementById('loading');
const tours_container = document.getElementById('tours');
const selected_tags_container = document.getElementById('selected-tags'); 

const input_tags = document.getElementById('input_tags');
const input_discount = document.getElementById('input-discount');
const input_seasons = document.getElementById('input-seasons');
const input_complexities = document.getElementById('input-complexities');
const input_price_range = document.getElementById('input-price');

const tags = input_tags.getElementsByTagName('button');
const seasons = input_seasons.getElementsByTagName('button');
const complexities = input_complexities.getElementsByTagName('button');

input_tags.getElementsByClassName('dropdown__toggle')[0].addEventListener('click', function(event) {
    input_tags.getElementsByClassName('dropdown__menu-wrapper')[0].classList.toggle('active');
});

input_discount.getElementsByClassName('toggle__switcher')[0].addEventListener('click', function(event) {
    this.classList.toggle('active');
});

for (let tag of tags) {
    tag.addEventListener('click', function (event) {
        const id = this.getAttribute('data-tag-id');
        
        if (active_tags.indexOf(id) === -1) {
            active_tags.push(id);
            this.classList.add('active');

            selected_tags_container.append(get_selected_tag(
                tag.innerText,
                id
            ));
        }
        else {
            active_tags = active_tags.filter(value => { return value !== id });
            this.classList.remove('active');

            remove_selected_tag(id);
        }
    });
}

input_discount.getElementsByClassName('toggle__switcher')[0].addEventListener('click', function (event){
    is_discount = !is_discount;
    
    is_discount ? this.classList.add('active') : this.classList.remove('active');
});

for (let complexity of complexities) {
    complexity.addEventListener('click', function (event) {
        const id = this.getAttribute('data-complexity-id');
        
        if (active_complexities.indexOf(id) === -1) {
            active_complexities.push(id);
            this.classList.add('active');
        }
        else {
            active_complexities = active_complexities.filter(value => { return value !== id });
            this.classList.remove('active');
        }
    });
}

for (let season of seasons) {
    season.addEventListener('click', function (event) {
        const id = this.getAttribute('data-season-id');
        
        if (active_seasons.indexOf(id) === -1) {
            active_seasons.push(id);
            this.classList.add('active');
        }
        else {
            active_seasons = active_seasons.filter(value => { return value !== id });
            this.classList.remove('active');
        }
    });
}

input_price_range
    .getElementsByTagName('input')[0]
    .addEventListener('input', function(event) {
        min_price = this.value;
});
input_price_range
    .getElementsByTagName('input')[1]
    .addEventListener('input', function(event) {
        max_price = this.value;
});

min_price = input_price_range.getElementsByTagName('input')[0].value;
max_price = input_price_range.getElementsByTagName('input')[1].value;

search_form.addEventListener('submit', function(event) {
    event.preventDefault();

    loading_container.classList.add('active');
    tours_container.classList.remove('active');

    axios.post('/api/v1/tours/search', {
        min_price: min_price,
        max_price: max_price,
        is_discount: is_discount,
        tags: JSON.stringify(active_tags),
        seasons: JSON.stringify(active_seasons),
        complexities: JSON.stringify(active_complexities)
    }).then(response => {
        let searched_tours = response.data;
        
        tours.innerHTML = '';

        console.log(searched_tours);

        searched_tours.forEach(t => {
            tours.append(create_tour_element(t));
        });

        let modal_trigger_els = document.getElementsByClassName("m-tour-card__booking-btn");
        window.app.modal_fade_manager.update_modal_triggers(0, modal_trigger_els);
    
        loading_container.classList.remove('active');
        tours_container.classList.add('active');
    });
});

function create_tour_element(tour) {
    const wrapper_start = '<div class="col-sm mb-6"><div class="ml-auto mr-auto d-flex justify-content-center">';
    const wrapper_end = '</div></div>';

    let tour_el = '<article class="m-tour-card"><div class="m-tour-card__image-wrapper">';
    if (tour.card_image_path)
        tour_el += `<img class="m-tour-card__image" src="/images/storage/tours/${tour.id}/${tour.card_image_path}">`;
    else
        tour_el += `<img class="m-tour-card__image" src="/images/storage/tours/${tour.id}/${tour.image_path}">`;
    
    tour_el += '</div><div class="m-tour-card__content ph-4 pv-6"><div class="m-tour-card__tags">';
    for (let i = 0; i < tour.tags.length && i < 3; i++)
    {
        tour_el += '<a class="m-tour-card__tag ';
        tour_el += (i != 0) ? 'ml-3"' : '"';
        tour_el += `href="/tags/${tour.tags[i].id}">`;
        tour_el += `<img src="${tour.tags[i].image_path}" `; 
        tour_el += `title="${tour.tags[i].name}"></a>`   
    }
    tour_el += '</div>';
    tour_el += '<div class="m-tour-card__text"><h3 class="m-tour-card__title mb-1">';
    tour_el += `<a href="/tours/${tour.id}">${tour.title}</a></h3>`;
    tour_el += `<p class="m-tour-card__paragraph">${tour.description}</p></div>`;

    tour_el += '<div class="m-tour-card__price mt-n6 mb-n6"><span class="u-text_size_24">';
    if (tour.discount_price == null)
    {
        tour_el += tour.price.toLocaleString('ru-RU', {
            style: 'currency',
            currency: 'RUB',
            maximumFractionDigits: 0
        });
        tour_el += '</span>';
    }
    else
    {
        tour_el += tour.discount_price.toLocaleString('ru-RU', {
            style: 'currency',
            currency: 'RUB',
            maximumFractionDigits: 0
        });
        tour_el += ' </span>';
    
        tour_el += '<span><del>';
        tour_el += tour.price.toLocaleString('ru-RU', {
            style: 'currency',
            currency: 'RUB',
            maximumFractionDigits: 0
        });
        tour_el += '</del></span>';
    }
    tour_el += '</div>';
    
    tour_el += '<div class="m-tour-card__links">';
    tour_el += '<a class="u-btn u-btn_size_small u-btn_theme_transparent ph-0 mr-1" ';
    tour_el += `href="/tours/${tour.id}">Подробнее</a>`;
    tour_el += '<a class="u-btn u-btn_size_small u-btn_theme_white ph-0 ml-1 m-tour-card__booking-btn">';
    tour_el += 'Хочу поехать</a></div></div></article>';

    const parser = new DOMParser();
	const doc = parser.parseFromString(wrapper_start + tour_el + wrapper_end, 'text/html');
    return doc.body.childNodes[0];
}

function get_selected_tag(text, id) {
    let el = `<button data-tag-id="${id}" class="selected-tag mr-4 mb-2"><span>${text}</span>`
        + '<img src="/images/static/modal-close.svg" class="ml-2" width="24" height="24">'
        + '</button>';
    
    const parser = new DOMParser();
	const doc = parser.parseFromString(el, 'text/html');
    const btn = doc.body.childNodes[0];

    btn.addEventListener('click', function() {
        const id = this.getAttribute('data-tag-id');
        
        for (let tag of tags) {
            const tag_id = tag.getAttribute('data-tag-id');
            if (id != tag_id) continue;

            active_tags = active_tags.filter(value => { return value !== id });
            tag.classList.remove('active');
            break;
        }

        this.remove();
    });

    return btn;
}

function remove_selected_tag(id) {
    selected_tags_container.childNodes.forEach(ch => {
        if (id == ch.getAttribute('data-tag-id'))
            ch.remove();
    });
}