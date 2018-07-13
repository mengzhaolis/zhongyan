<div class="mainRight R asd">
    <h3>计算结果</h3>
    <p>浏览产品了解中研能为你做什么</p>
    <div class="classify">
        <h4>行业：</h4>
        <dl>
            <dt class="first">{{$ret->type_name}}</dt>
            <!-- <dd>新材料</dd> -->
        </dl>
    </div>
    <div class="typeRight">
        <h4>行业类型：</h4>
        <p>{{$ret->diaoyan_type}}</p>
    </div>
    <div class="content">
        <h4>行业内容：</h4>
        <p>{{$ret->diaoyan_xiang}}</p>
    </div>
    <div class="price">
        <h4>参考价格：</h4>
        <p><span>￥{{$ret->money}}</span></p>
        <div class="clear"></div>
        <ul>
            <li>①费用计算结果仅供参考；</li>
            <li>②稍后我们会主动联系您；</li>
            <li>③中研世纪行业专家会结合您实际需求，为您提供精准报价；</li>
        </ul>
    </div>
</div>