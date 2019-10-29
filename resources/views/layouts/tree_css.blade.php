<style>
    .tree ul {
        margin-left: 20px;
    }

    .tree li {
        list-style-type: none;
        margin:10px;
        position: relative;
    }

    .tree li::before {
        content: "";
        position: absolute;
        top:-7px;
        left:-20px;
        border-left: 1px solid #ccc;
        border-bottom:1px solid #ccc;
        border-radius:0 0 0 0px;
        width:20px;
        height:15px;
    }

    .tree li::after {
        position:absolute;
        content:"";
        top:8px;
        left:-20px;
        border-left: 1px solid #ccc;
        border-top:1px solid #ccc;
        border-radius:0px 0 0 0;
        width:20px;
        height:100%;
    }

    .tree li:last-child::after  {
        display:none;
    }

    .tree li:last-child:before{
        border-radius: 0 0 0 5px;
    }

    ul.tree>li:first-child::before {
        display:none;
    }

    ul.tree>li:first-child::after {
        border-radius:5px 0 0 0;
    }

    .tree li span {
        border: 1px #ccc solid;
        border-radius: 5px;
        padding:2px 5px;
    }
</style>