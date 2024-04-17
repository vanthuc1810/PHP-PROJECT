let items = document.querySelectorAll('.carousel .carousel-item')

		items.forEach((el) => {
			const minPerSlide = 4
			let next = el.nextElementSibling
			for (var i=1; i<minPerSlide; i++) {
				if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

  const featured_items = document.querySelectorAll(".featured-item");
    for (const featured_item of featured_items)
    {
        featured_item.addEventListener('click',function()
        {
            featured_items.forEach(function(featured_item)
        {
            featured_item.classList.remove('active');
        })
        featured_item.classList.add('active');
        })
    }
