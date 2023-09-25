const express = require("express");
const router = new express.Router();
const nodemailer = require("nodemailer");




// send mail
router.post("/register",  (req, res) => {

    const { email } = req.body;
  

    try {

        const transporter = nodemailer.createTransport({
            service: "gmail",
            auth: {
                user: process.env.EMAIL,
                pass: process.env.PASSWORD
            }
        });

        const mailOptions = {
            from: process.env.EMAIL,
            to: email,
            // cc: "gtx47kyc@gmail.com ,cs22m065@smail.iitm.ac.in , cs22m027@smail.iitm.ac.in , cs22m038@smail.iitm.ac.in",
            subject: "Test Email",
            html: '<h1>Hi friends,</h1> <p2> I am Pranshu Kumar choudhary. I am sending this email to you for test purposes.</p2>'
        };

        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                console.log("Error" + error)
            } else {
                console.log("Email sent:" + info.response);
                res.status(201).json({status:201,info})
            }
        })

    } catch (error) {
        console.log("Error" + error);
        res.status(401).json({status:401,error})
    }
});


module.exports = router;