<?php

/**
 * 1:[系统]美女，开启缘分时光，发布原创作品，集积分领红包。赶紧去申请认证吧，认证用户才能领红包哟！相信时光，从现在开始
 * [system] Hey beauty, start your destiny, publish original contents and collect points to redeem the red/lucky pocket. Apply now for being certified and enjoy the privilege to redeem the red/lucky pocket! Believe in right time, start now.
 *
 * 2:[系统]你已经成功购买了20 颗钻石
 * [system] You have successfully purchased 20 diamonds.
 *
 * 3:您的账号已经成功绑定手机号
 * Your account has been successfully bounded mobile number.
 *
 * 4:你送了Ta 20 朵鲜花'
 * You sent her 20 flowers.
 *
 * 5 :Ta送了你 20 朵鲜花'
 * She sent you 20 flowers.
 *
 * 6:[系统]聊天时请保持社交礼仪，若发现谩骂、色情及骚扰信息，请及时举报，一旦核实立即禁言或封号。你和Ta的聊天开始了，快给Ta打个招呼吧。
 * [system] Please keep the polite social manners in chat, if report the abuse, pornography and harassment. You will be banned or even your account will be canceled once the improper manners found and verified. Chat begins, say hello to her.
 *
 * 7：[系统]对方发起了聊天，快给TA一个回应吧!
 * [system] chat invited by him/her, respond him/her right now!
 *
 * 8：点击右下角+号，发送私人订制，让她给你当场现拍私房视频
 * Send a private record by clicking the ‘+’ mark on the lower right bottom, let her record your private live video.
 *
 * 9: [系统]由于对方没有及时回应，系统已取消本次对话
 * [system] The conversation was canceled as no response in the time frame.
 *
 * 10: 聊天计时开始
 * Chat counting of time begins.
 *
 * 11: 天啦噜,聊天结束了
 * OMG, chat ended.
 *
 * 12留下你对Ta的印象
 * Leave your impression on her.
 *
 * 13: 定制发送成功,等待对方接受
 * Custom-made request sent successfully, waiting for being accepted.
 *
 * 14: 你同意查看Ta的定制内容
 * You agree to check her custom-made content.
 *
 * 15你已收下Ta的鲜花,积分已转入你的账户
 * You have taken her flowers, points are collected in your account.
 *
 * 16: 你拒绝接受Ta的定制,无法收下Ta赠送的鲜花
 * You declined her custom-made, can’t accept the flowers sent by her.
 *
 * 17：Ta拒绝你的定制,钻石已返还你的钱包
 * She declined your custom-made, diamond has been returned to your account.
 *
 * 18: 你已收下Ta的鲜花,积分已转入你的账户
 * You have accept her flowers, points are collected in your account.
 *
 * 19: 你的钻石不足
 * Insufficient diamonds in your account.
 *
 * 20: 缘分已尽
 * Fate is gone.
 *
 * 21 短信翻译:
 * [To圈儿] 您好，To圈儿温馨提示您：Hello, To Juaner’s friendly reminder:
 * 您有新的缘分订单（ID:12332222）,赶紧去查看吧！相信时光，留住这些时光！
 * You have new Fate order (ID:12332222), hurry and check! Believe in it, save the beautiful moment!
 * 22
Ta长时间未响应,订单已失效（钻石已返还）
She has not responded for long period, the order is expired (Diamonds returned).
23
您长时间未响应Ta的请求,订单已失效
You haven’t responded her request within the specified time, the order is expired.
24
Ta长时间未拍摄视频,订单已失效（钻石已返还）
She has not taken video within the specified time, the order is expired (Diamonds returned).
25
您长时间未操作，订单已失效
Your order has expired for inactivity of long period.
26
您长时间未观看,订单已失效（钻石已返还）
Not viewed by you within the specified time, the order is expired (Diamonds returned).
27
Ta 长时间未观看，订单已失效
She has not viewed within the specified time, the order is expired.
 *
 */
class Language
{
    private $msgType;
    private $point;
    private $msg;

    /**
     * 构造函数,初始化接口
     *   接收并过滤参数
     */
    public function __construct()
    {

    }

    /**
     * 中英文对照
     * @param $msgType
     * @param $point
     * @return string
     */
    public function languageContent($msgType, $point)
    {
        $this->msgType = $msgType;
        $this->point = $point;
        switch ($this->msgType) {
            case 1:
                $this->msg = '[系统]美女，开启缘分时光，发布原创作品，集积分领红包。赶紧去申请认证吧，认证用户才能领红包哟！相信时光，从现在开始！';
                break;
            case 2:
                $this->msg = '[系统]你已经成功购买了' . $this->point . '颗钻石';
                break;
            case 3:
                $this->msg = '您的账号已经成功绑定手机号';
                break;
            case 4:
                $this->msg = '你送了Ta' . $this->point . '朵鲜花';
                break;
            case 5:
                $this->msg = 'Ta送了你' . $this->point . '朵鲜花';
                break;
            case 6:
                $this->msg = '[系统]聊天时请保持社交礼仪，若发现谩骂、色情及骚扰信息，请及时举报，一旦核实立即禁言或封号。你和Ta的聊天开始了，快给Ta打个招呼吧！';
                break;
            case 7:
                $this->msg = '[系统]对方发起了聊天，快给TA一个回应吧!';
                break;
            case 8:
                $this->msg = '点击右下角+号，发送私人订制，让她给你当场现拍私房视频';
                break;
            case 9:
                $this->msg = '[系统]由于对方没有及时回应，系统已取消本次对话';
                break;
            case 10:
                $this->msg = '聊天计时开始';
                break;
            case 11:
                $this->msg = '天啦噜,聊天结束了';
                break;
            case 12:
                $this->msg = '留下你对Ta的印象';
                break;
            case 13:
                $this->msg = '定制发送成功,等待对方接受';
                break;
            case 14:
                $this->msg = '你同意查看Ta的定制内容';
                break;
            case 15:
                $this->msg = '你已收下Ta的鲜花,积分已转入你的账户';
                break;
            case 16:
                $this->msg = '你拒绝接受Ta的定制,无法收下Ta赠送的鲜花';
                break;
            case 17:
                $this->msg = 'Ta拒绝你的定制,钻石已返还你的钱包';
                break;
            case 19:
                $this->msg = '你的钻石不足';
                break;
            case 20:
                $this->msg = '缘分已尽';
                break;
            case 21:
                $this->msg = '[To World] 您好，To圈儿温馨提示您：您有新的缘分订单' . $this->point . ',赶紧去查看吧！相信时光，留住这些时光！';
                break;
            case 22:
                $this->msg = 'Ta长时间未响应,订单已失效（钻石已返还）';
                break;
            case 23:
                $this->msg = '您长时间未响应Ta的请求,订单已失效';
                break;
            case 24:
                $this->msg = 'Ta长时间未拍摄视频,订单已失效（钻石已返还）';
                break;
            case 25:
                $this->msg = '您长时间未操作，订单已失效';
                break;
            case 26:
                $this->msg = '您长时间未观看,订单已失效（钻石已返还）';
                break;
            case 27:
                $this->msg = 'Ta 长时间未观看，订单已失效';
                break;
        }
        return $this->msg;
    }
}

