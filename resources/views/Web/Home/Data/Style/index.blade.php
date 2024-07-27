<style>
    #map-container {
        position: relative;
    }

    #map {
        height: 65vh;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    #map-overlay {
        position: absolute;
        top: 5%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(7, 80, 37, 0.61);
        padding: 10px;
        border-radius: 5px;
        z-index: 9999;
        height: 25px;
    }

    .overlay-text {
        color: white;
        font-size: 16px;
        text-align: center;
        margin: 0;
    }

    .card.card-1 {
        border-radius: 20px;
        padding: 20px;
        color: #fff;
        display: flex;
        background-color: #43936C;
        height: 400px;
    }

    .card-1 .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-1 .text {
        width: 50%;
        margin-left: 100px;
        margin-top: 80px;
    }

    .card-1 img {
        margin-right: 50px;
        margin-top: 50px;
        width: 400px;
        height: 250px;
        object-fit: cover;
        border-radius: 20px;
    }

    .card.card-2 {
        border-radius: 10px;
        padding: 20px;
        color: #fff;
        display: flex;
        background-color: #3181B6;
        height: 400px;
    }

    .card-2 .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-2 .text {
        width: 50%;
        margin-left: 100px;
        margin-top: 80px;
    }

    .card-2 img {
        margin-right: 50px;
        margin-top: 50px;
        width: 400px;
        height: 250px;
        object-fit: cover;
        border-radius: 20px;
    }

    .card.card-3 {
        border-radius: 10px;
        padding: 20px;
        color: #fff;
        display: flex;
        background-color: #CA6634;
        height: 400px;
    }

    .card-3 .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-3 .text {
        width: 50%;
        margin-left: 100px;
        margin-top: 80px;
    }

    .card-3 img {
        margin-right: 50px;
        margin-top: 50px;
        width: 400px;
        height: 250px;
        object-fit: cover;
        border-radius: 20px;
    }

    .card.card-4 {
        border-radius: 10px;
        padding: 20px;
        color: #fff;
        display: flex;
        background-color: #CB344C;
        height: 400px;
    }

    .card-4 .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-4 .text {
        width: 50%;
        margin-left: 100px;
        margin-top: 80px;
    }

    .card-4 img {
        margin-right: 50px;
        margin-top: 50px;
        width: 400px;
        height: 250px;
        object-fit: cover;
        border-radius: 20px;
    }

    .text h3 {
        color: #fff;
    }

    .text p {
        color: #fff;
    }


    .container.container-card {
        width: 100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    label {
        color: #262626;
        font-size: 17px;
        line-height: 24px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    p {
        font-size: 17px;
        font-weight: 400;
        line-height: 20px;
        color: #000000;

        &.small {
            font-size: 14px;
        }
    }

    .go-corner {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        width: 32px;
        height: 32px;
        overflow: hidden;
        top: 0;
        right: 0;
        background-color: #075741;
        border-radius: 0 4px 0 32px;
    }

    .go-arrow {
        margin-top: -4px;
        margin-right: -4px;
        color: white;
        font-family: courier, sans;
    }

    .card1 {
        display: block;
        position: relative;
        background-color: #f2f8f9;
        border-radius: 4px;
        padding: 32px 24px;
        margin: 12px;
        text-decoration: none;
        z-index: 0;
        overflow: hidden;

        &:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -16px;
            right: -16px;
            background: #075741;
            height: 32px;
            width: 50px;
            border-radius: 32px;
            transform: scale(1);
            transform-origin: 50% 50%;
            transition: transform 0.25s ease-out;
        }

        &:hover:before {
            transform: scale(21);
        }
    }

    .card1:hover p {
        transition: all 0.3s ease-out;
        color: rgba(255, 255, 255, 0.8);
    }

    .card1:hover label {
        transition: all 0.3s ease-out;
        color: #ffffff;
    }

    .maps {
        position: relative;
        z-index: 5;
    }

    @media only screen and (max-width: 575.99px) {
        .card-1 .text {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            z-index: 1;
            position: relative;

        }

        .card-1 img {
            position: absolute;
            bottom: 25px;
            left: auto;
            right: auto;
            height: 100px;
            width: 300px;
        }

        .card-2 .text {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            z-index: 1;
            position: relative;
        }

        .card-2 img {
            position: absolute;
            bottom: 25px;
            left: auto;
            right: auto;
            height: 100px;
            width: 300px;
        }

        .card-3 .text {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            z-index: 1;
            position: relative;

        }

        .card-3 img {
            position: absolute;
            bottom: 25px;
            left: auto;
            right: auto;
            height: 100px;
            width: 300px;
        }

        .card-4 .text {
            width: 100%;
            margin-left: 0;
            margin-top: 0;
            z-index: 1;
            position: relative;

        }

        .card-4 img {
            position: absolute;
            bottom: 25px;
            left: auto;
            right: auto;
            height: 100px;
            width: 300px;
        }

        #map-overlay {
            display: none;
        }

        .overlay-text {
            display: none;
        }
    }
</style>
