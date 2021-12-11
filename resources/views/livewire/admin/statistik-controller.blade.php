<div>

    <div class="select-box">
        <div class="select-box__current" tabindex="1">
            <div class="select-box__value">
                <input wire:model="section" class="select-box__input" type="radio" id="0" value="1" checked="checked" />
                <p class="select-box__input-text">Inkubasi Bahasa</p>
            </div>
            <div class="select-box__value">
                <input wire:model="section" class="select-box__input" type="radio" id="1" value="2"/>
                <p class="select-box__input-text">Jawara Center</p>
            </div>
            <div class="select-box__value">
                <input wire:model="section" class="select-box__input" type="radio" id="2" value="3"/>
                <p class="select-box__input-text">Student Exchange</p>
            </div>
            <div class="select-box__value">
                <input wire:model="section" class="select-box__input" type="radio" id="3" value="4" />
                <p class="select-box__input-text">On The Job Training</p>
            </div>
        </div>
        <ul class="select-box__list">
            <li>
                <label class="select-box__option" for="0" aria-hidden="aria-hidden">Inkubasi Bahasa</label>
            </li>
            <li>
                <label class="select-box__option" for="1" aria-hidden="aria-hidden">Jawara Center</label>
            </li>
            <li>
                <label class="select-box__option" for="2" aria-hidden="aria-hidden">Student Exchange</label>
            </li>
            <li>
                <label class="select-box__option" for="3" aria-hidden="aria-hidden">On The Job Training</label>
            </li>
        </ul>
    </div>
    @switch($section)
        @case(1)

            @break
        @case(2)

            @break
        @case(3)

            @break
        @case(4)

            @break
        @default

    @endswitch
    <style wire:ignore>
        .select-box {
            position: relative;
            display: block;
            width: 100%;
            margin: 0 auto;
            font-family: "Open Sans", "Helvetica Neue", "Segoe UI", "Calibri", "Arial", sans-serif;
            font-size: 18px;
            color: #60666d;
            border-bottom: 1px solid black;
        }

        @media (min-width: 768px) {
            .select-box {
                width: 70%;
            }
        }

        @media (min-width: 992px) {
            .select-box {
                width: 50%;
            }
        }

        @media (min-width: 1200px) {
            .select-box {
                width: 30%;
            }
        }

        .select-box__current {
            position: relative;
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            outline: none;
        }

        .select-box__current:focus+.select-box__list {
            opacity: 1;
            -webkit-animation-name: none;
            animation-name: none;
        }

        .select-box__current:focus+.select-box__list .select-box__option {
            cursor: pointer;
        }

        .select-box__current:focus .select-box__icon {
            transform: translateY(-50%) rotate(180deg);
        }

        .select-box__icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            width: 20px;
            opacity: 0.3;
            transition: 0.2s ease;
        }

        .select-box__value {
            display: flex;
        }

        .select-box__input {
            display: none;
        }

        .select-box__input:checked+.select-box__input-text {
            display: block;
        }

        .select-box__input-text {
            display: none;
            width: 100%;
            margin: 0;
            padding: 15px;
            background-color: #fff;
        }

        .select-box__list {
            position: absolute;
            width: 100%;
            padding: 0;
            list-style: none;
            opacity: 0;
            -webkit-animation-name: HideList;
            animation-name: HideList;
            -webkit-animation-duration: 0.5s;
            animation-duration: 0.5s;
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-timing-function: step-start;
            animation-timing-function: step-start;
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
        }

        .select-box__option {
            display: block;
            padding: 15px;
            background-color: #fff;
        }

        .select-box__option:hover,
        .select-box__option:focus {
            color: #546c84;
            background-color: #fbfbfb;
        }

        @-webkit-keyframes HideList {
            from {
                transform: scaleY(1);
            }

            to {
                transform: scaleY(0);
            }
        }

        @keyframes HideList {
            from {
                transform: scaleY(1);
            }

            to {
                transform: scaleY(0);
            }
        }

    </style>
    <script wire:ignore src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script wire:ignore>

    </script>
</div>
