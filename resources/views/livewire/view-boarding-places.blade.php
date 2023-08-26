{{--@section('main')--}}
{{--    <div>--}}
{{--        @foreach($images as $image) @endforeach--}}
{{--        <div class="relative grid grid-cols-12 w-full lg:max-w-7xl mx-auto md:p-4">--}}
{{--            <div class="col-span-12 md:col-span-6 md:mr-2">--}}

{{--                <div class="transition-all duration-100 ease-in-out w-full" x-data="ProductGallery($el)"--}}
{{--                     x-init="$watch('activeImage', value => scroll());"--}}
{{--                     :class="{'absolute inset z-50 overflow-hidden bg-white flex flex-col gap-4 p-6': isFullScreen, 'relative': !isFullScreen}"--}}
{{--                     @keydown.escape="closeFullScreen()">--}}

{{--                    <div class="text-right z-50" x-show="isFullScreen" x-cloak>--}}
{{--                        <a href="#" @click.prevent="toggleFullScreen">--}}
{{--                            <i class="fas fa-times text-2xl text-indigo-600"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <ul class="flex flex-grow-1 flex-nowrap overflow-x-scroll whitespace-nowrap snap snap-x snap-mandatory no-scrollbar scroll-behavior-smooth mb-6"--}}
{{--                        @mouseover="zoomIn" @mouseout="zoomOut" @mousemove="zoomMove(event)"--}}
{{--                        @touchmove="zoomMove(event)"--}}
{{--                        @click.prevent="if(!isFullScreen){ toggleFullScreen() }else{ toggleFullSizeZoom() }">--}}
{{--                        <template x-for="(image, i) in images" :key="image">--}}
{{--                            <li class="relative w-full h-full flex-shrink-0 snap-start">--}}
{{--            <span href="#">--}}
{{--              <img :src="image.url" class="m-auto max-h-full max-w-full">--}}
{{--            </span>--}}
{{--                            </li>--}}
{{--                        </template>--}}
{{--                    </ul>--}}
{{--                    <div class="m-auto max-w-full">--}}
{{--                        <div class="flex" x-show="images.length>1" x-cloak>--}}
{{--                            <a class="h-28 flex-grow-0 text-indigo-600 inline-flex items-center text-xl bg-white p-4"--}}
{{--                               href="#" @click.prevent="prevImage">--}}
{{--                                <i class="fas fa-arrow-left"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="flex flex-grow-1 flex-nowrap overflow-x-scroll whitespace-nowrap snap snap-x snap-mandatory no-scrollbar scroll-behavior-smooth">--}}
{{--                                <template x-for="(image, i) in images" :key="image">--}}
{{--                                    <li class="w-28 flex-shrink-0 snap-start mx-1" @wheel="mousewheelEvent($event)">--}}
{{--                                        <a class="inline-block border-4" href="#" @click.prevent="activeImage=i"--}}
{{--                                           :class="{'border-indigo-600': activeImage==i, 'border-white': activeImage!=i}">--}}
{{--                                            <img :src="image.thumb" height="150" width="150">--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </template>--}}
{{--                            </ul>--}}
{{--                            <a class="h-28 flex-grow-0 inline-flex items-center text-xl text-indigo-600 bg-white p-4"--}}
{{--                               href="#" @click.prevent="nextImage">--}}
{{--                                <i class="fas fa-arrow-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div data-zoom--}}
{{--                         class="absolute h-full w-full z-40 top-full left-0 -mt-36 md:left-full md:top-0 md:mt-0 transition-all ease-out duration-300 bg-indigo-500"--}}
{{--                         x-show="zoomIsActive && !isFullScreen"></div>--}}
{{--                    <div data-lens--}}
{{--                         class="absolute object-contain	 top-0 left-0 transition-transform ease-out duration-75 shadow z-50 transform-gpu pointer-events-none border-2"--}}
{{--                         x-show="zoomIsActive && !isFullScreen"></div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-span-12 md:col-span-6 md:ml-2">--}}
{{--                <h1 class="text-3xl font-bold mb-4">{{$boarding_place->name}}</h1>--}}
{{--                <div class="mb-4">--}}
{{--                    <i class="fas fa-star text-indigo-400"></i>--}}
{{--                    <i class="fas fa-star text-indigo-400"></i>--}}
{{--                    <i class="fas fa-star text-indigo-400"></i>--}}
{{--                    <i class="fas fa-star text-indigo-400"></i>--}}
{{--                    <i class="fas fa-star text-indigo-400"></i>--}}
{{--                    <i class="far fa-star text-indigo-400"></i>--}}
{{--                    <i class="far fa-star text-indigo-400"></i>--}}
{{--                </div>--}}

{{--                <div class="mb-4 pb-4 border-b-2">{{$boarding_place->description}}--}}
{{--                </div>--}}
{{--                <div class="mb-4 pb-4 border-b-2">{{$boarding_place->features}}--}}
{{--                </div>--}}
{{--                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">--}}
{{--                    <div class="flex">--}}
{{--                        <span class="mr-3 bg-green-100 p-1 rounded">{{$boarding_place->target_audience}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="flex ml-6 items-center">--}}
{{--                        <span class="mr-3">Availability</span>--}}
{{--                        <div class="relative bg-green-100 p-1 rounded">--}}
{{--                            {{$boarding_place->availability}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="flex ml-6 items-center">--}}
{{--                        <span class="mr-3">No of Rooms</span>--}}
{{--                        <div class="relative bg-green-100 p-1 rounded">--}}
{{--                            {{$boarding_place->number_of_rooms}}--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="flex w-full justify-between">--}}
{{--                    <div class="text-gray-400 mr-4 py-3">--}}
{{--                        <span>only</span> <span--}}
{{--                            class="text-2xl font-bold text-indigo-600">Rs. {{$boarding_place->price}}</span>--}}
{{--                    </div>--}}
{{--                    <button wire:click="reserveBoarding({{$boarding_place->id}})"--}}
{{--                            class="bg-indigo-600 text-white text-lg font-bold width-auto px-4 py-1 shadow-lg hover:text-indigo-600 hover:bg-white transition-colors">--}}
{{--                        Reserve--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <script>--}}
{{--                var images = <?php echo json_encode($images); ?>;--}}

{{--                window.ProductGallery = function ($el) {--}}
{{--                    return {--}}
{{--                        isFullScreen: false,--}}
{{--                        showArrows: false,--}}
{{--                        count: images.length,--}}
{{--                        activeImage: 0,--}}
{{--                        $imageEl: $el.querySelectorAll("ul")[0],--}}
{{--                        $thumbNavEl: $el.querySelectorAll("ul")[1] || null,--}}
{{--                        $zoomEl: $el.querySelector("*[data-zoom]"),--}}
{{--                        $lensEl: $el.querySelector("*[data-lens]"),--}}
{{--                        zoomIsActive: false,--}}
{{--                        zoomRatio: {width: 1, height: 1},--}}
{{--                        zoomSize: null,--}}
{{--                        lensSize: null,--}}
{{--                        previewSize: null,--}}

{{--                        fullSizeZoomDisabled: true,--}}
{{--                        fullSizeZoomIsActive: false,--}}
{{--                        $fullSizeZoomEl: null,--}}
{{--                        fullSizeZoomSize: null,--}}

{{--                        nextImage: function () {--}}
{{--                            this.activeImage =--}}
{{--                                this.activeImage + 1 < this.count ? this.activeImage + 1 : 0;--}}
{{--                        },--}}

{{--                        prevImage: function () {--}}
{{--                            this.activeImage =--}}
{{--                                this.activeImage > 0 ? this.activeImage - 1 : this.count - 1;--}}
{{--                        },--}}

{{--                        mousewheelEvent: function (event) {--}}
{{--                            if (event.deltaY > 0) {--}}
{{--                                this.nextImage();--}}
{{--                                event.preventDefault();--}}
{{--                            } else if (event.deltaY < 0) {--}}
{{--                                this.prevImage();--}}
{{--                                event.preventDefault();--}}
{{--                            }--}}
{{--                        },--}}

{{--                        scroll: function () {--}}
{{--                            this.scrollToImage();--}}
{{--                            this.scrollToThumb();--}}
{{--                        },--}}

{{--                        scrollToThumb: function () {--}}
{{--                            if (!this.$thumbNavEl) {--}}
{{--                                return;--}}
{{--                            }--}}
{{--                            const $activeThumb = this.$thumbNavEl.querySelector(--}}
{{--                                "ul li:nth-child(0n+" + (this.activeImage + 1) + ")"--}}
{{--                            );--}}
{{--                            if ($activeThumb) {--}}
{{--                                this.$thumbNavEl.offsetTop =--}}
{{--                                    $activeThumb.offsetTop +--}}
{{--                                    this.$thumbNavEl.clientHeight / 2 ---}}
{{--                                    $activeThumb.clientHeight / 2;--}}
{{--                                this.$thumbNavEl.scrollLeft =--}}
{{--                                    $activeThumb.offsetLeft ---}}
{{--                                    this.$thumbNavEl.clientWidth / 2 +--}}
{{--                                    $activeThumb.clientWidth / 2;--}}
{{--                            }--}}
{{--                        },--}}

{{--                        scrollToImage: function () {--}}
{{--                            const $activeImage = this.$imageEl.children[this.activeImage + 1];--}}
{{--                            this.$imageEl.scrollLeft = $activeImage.offsetLeft;--}}
{{--                            if (this.isFullScreen) {--}}
{{--                                this.showFullScreenImage();--}}
{{--                            }--}}
{{--                        },--}}

{{--                        toggleFullScreen: function () {--}}
{{--                            this.isFullScreen--}}
{{--                                ? this.closeFullScreen()--}}
{{--                                : this.openFullScreen();--}}

{{--                            // wait for css rendering then scroll to active image--}}
{{--                            let _this = this;--}}
{{--                            setTimeout(function () {--}}
{{--                                _this.scroll();--}}
{{--                            }, 100);--}}
{{--                        },--}}

{{--                        openFullScreen: function () {--}}
{{--                            document.body.style.overflowY = "hidden";--}}
{{--                            document.body.style.height = "100vh";--}}
{{--                            this.isFullScreen = true;--}}

{{--                            // wait for css transition because we need the element size--}}
{{--                            setTimeout(this.showFullScreenImage.bind(this), 200);--}}
{{--                        },--}}

{{--                        closeFullScreen: function () {--}}
{{--                            document.body.style.overflowY = null;--}}
{{--                            document.body.style.height = null;--}}
{{--                            this.isFullScreen = false;--}}
{{--                            this.$fullSizeZoomEl.remove();--}}
{{--                            this.zoomOut;--}}

{{--                            // wait for css transition and remove zoom--}}
{{--                            setTimeout(this.zoomOut.bind(this), 100);--}}
{{--                        },--}}

{{--                        showFullScreenImage: async function () {--}}

{{--                            if (this.$fullSizeZoomEl) {--}}
{{--                                this.$fullSizeZoomEl.remove();--}}
{{--                            }--}}

{{--                            this.$fullSizeZoomEl = document.createElement("span");--}}
{{--                            this.$fullSizeZoomEl.classList.add(--}}
{{--                                "absolute", "top-0", "left-0",--}}
{{--                                "inline-block", "w-full", "h-full",--}}
{{--                                "bg-white", "bg-contain", "bg-center", "bg-no-repeat",--}}
{{--                                "cursor-zoom-in",--}}
{{--                                "transition-all", "duration-300", "ease-out"--}}
{{--                            );--}}

{{--                            this.$imageEl.querySelectorAll('li span')[this.activeImage].append(this.$fullSizeZoomEl);--}}

{{--                            this.fullSizeZoomSize = this.$fullSizeZoomEl.getBoundingClientRect();--}}
{{--                            this.fullSizeImageSize = await this.getImageMeta(--}}
{{--                                images[this.activeImage].original--}}
{{--                            );--}}

{{--                            this.$fullSizeZoomEl.style.backgroundImage = "url('" + images[this.activeImage].original + "')";--}}

{{--                            if (this.fullSizeImageSize.width > this.fullSizeZoomSize.width || this.fullSizeImageSize.height > this.fullSizeZoomSize.height) {--}}
{{--                                this.fullSizeZoomDisabled = false;--}}
{{--                            }--}}
{{--                        },--}}

{{--                        updateFullScreenZoom: function (event) {--}}
{{--                            let x = event.layerX - event.target.offsetLeft;--}}
{{--                            let y = event.layerY - event.target.offsetTop;--}}

{{--                            x = -1 * (this.fullSizeImageSize.width - this.fullSizeZoomSize.width) / (this.fullSizeZoomSize.width / x);--}}
{{--                            y = -1 * (this.fullSizeImageSize.height - this.fullSizeZoomSize.height) / (this.fullSizeZoomSize.height / y);--}}

{{--                            this.$fullSizeZoomEl.style.backgroundPosition = x + "px " + y + "px";--}}
{{--                        },--}}

{{--                        resetFullScreenZoom: function () {--}}
{{--                            this.$fullSizeZoomEl.classList.add("bg-contain", "cursor-zoom-in");--}}
{{--                            this.$fullSizeZoomEl.classList.remove("bg-auto", "cursor-zoom-out");--}}
{{--                            this.$fullSizeZoomEl.style.backgroundPosition = "center";--}}
{{--                        },--}}

{{--                        setFullScreenZoom: function () {--}}
{{--                            this.$fullSizeZoomEl.classList.remove("bg-contain", "cursor-zoom-in");--}}
{{--                            this.$fullSizeZoomEl.classList.add("bg-auto", "cursor-zoom-out");--}}
{{--                        },--}}

{{--                        showZoom: function () {--}}
{{--                            this.zoomIsActive = true;--}}
{{--                        },--}}

{{--                        hideZoom: function () {--}}
{{--                            this.zoomIsActive = false;--}}
{{--                        },--}}

{{--                        zoomOut: function () {--}}
{{--                            if (this.isFullScreen) {--}}
{{--                                if (this.fullSizeZoomIsActive) {--}}
{{--                                    this.resetFullScreenZoom();--}}
{{--                                }--}}
{{--                                return;--}}
{{--                            }--}}
{{--                            this.hideZoom();--}}
{{--                        },--}}

{{--                        zoomIn: async function () {--}}

{{--                            if (this.isFullScreen) {--}}
{{--                                if (this.fullSizeZoomIsActive) {--}}
{{--                                    this.setFullScreenZoom();--}}
{{--                                }--}}
{{--                                return;--}}
{{--                            }--}}

{{--                            this.showZoom();--}}
{{--                            this.$zoomEl.style.backgroundImage = null;--}}
{{--                            this.origImgSize = await this.getImageMeta(--}}
{{--                                images[this.activeImage].original--}}
{{--                            );--}}
{{--                            this.previewSize = this.$imageEl.getBoundingClientRect();--}}
{{--                            this.zoomSize = this.$zoomEl.getBoundingClientRect();--}}
{{--                            this.hideZoom();--}}

{{--                            // display origin image--}}
{{--                            this.$zoomEl.style.backgroundImage = "url('" + images[this.activeImage].original + "')";--}}

{{--                            // original image to preview image ratio--}}
{{--                            this.zoomRatio.width = this.origImgSize.width / this.previewSize.width;--}}
{{--                            this.zoomRatio.height = this.origImgSize.height / this.previewSize.height;--}}

{{--                            // lens size--}}
{{--                            this.lensSize = {--}}
{{--                                width: this.zoomSize.width / this.zoomRatio.width + 4,--}}
{{--                                height: this.zoomSize.height / this.zoomRatio.height + 4--}}
{{--                            };--}}
{{--                            this.$lensEl.style.width = this.lensSize.width + "px";--}}
{{--                            this.$lensEl.style.height = this.lensSize.height + "px";--}}

{{--                            this.showZoom();--}}
{{--                        },--}}

{{--                        zoomMove: function (event) {--}}
{{--                            event.stopPropagation();--}}

{{--                            if (this.isFullScreen) {--}}
{{--                                if (!this.fullSizeZoomDisabled && this.fullSizeZoomIsActive) {--}}
{{--                                    this.updateFullScreenZoom(event);--}}
{{--                                }--}}
{{--                                return;--}}
{{--                            }--}}

{{--                            if (!this.lensSize) {--}}
{{--                                return;--}}
{{--                            }--}}

{{--                            // lens position--}}
{{--                            let x = event.layerX - event.target.offsetLeft - this.lensSize.width / 2;--}}
{{--                            let y = event.layerY - event.target.offsetTop - this.lensSize.height / 2;--}}
{{--                            x = x > 0 ? x : 0;--}}
{{--                            y = y > 0 ? y : 0;--}}
{{--                            x =--}}
{{--                                x + this.lensSize.width > this.previewSize.width--}}
{{--                                    ? this.previewSize.width - this.lensSize.width--}}
{{--                                    : x;--}}
{{--                            y =--}}
{{--                                y + this.lensSize.height > this.previewSize.height--}}
{{--                                    ? this.previewSize.height - this.lensSize.height--}}
{{--                                    : y;--}}

{{--                            // translate (with transform-gpu class) has better performance than absolute positioning--}}
{{--                            this.$lensEl.style.webkitTransform = "translateX(" + x + "px) translateY(" + y + "px)";--}}

{{--                            // zoom image position--}}
{{--                            this.$zoomEl.style.backgroundPosition = (x * -this.zoomRatio.width) + "px " + (y * -this.zoomRatio.height) + "px";--}}
{{--                        },--}}

{{--                        toggleFullSizeZoom: function (event) {--}}
{{--                            this.fullSizeZoomIsActive--}}
{{--                                ? this.closeFullSizeZoom(event)--}}
{{--                                : this.showFullSizeZoom(event);--}}
{{--                        },--}}

{{--                        closeFullSizeZoom: function (event) {--}}
{{--                            this.fullSizeZoomIsActive = false;--}}
{{--                            this.resetFullScreenZoom();--}}
{{--                        },--}}

{{--                        showFullSizeZoom: function (event) {--}}
{{--                            this.fullSizeZoomIsActive = true;--}}
{{--                            this.setFullScreenZoom();--}}
{{--                        },--}}

{{--                        getImageMeta(url) {--}}
{{--                            return new Promise((resolve, reject) => {--}}
{{--                                const img = new Image();--}}
{{--                                img.onload = () => resolve(img);--}}
{{--                                img.onerror = (err) => reject(err);--}}
{{--                                img.src = url;--}}
{{--                            });--}}
{{--                        }--}}
{{--                    };--}}
{{--                };--}}

{{--            </script>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
