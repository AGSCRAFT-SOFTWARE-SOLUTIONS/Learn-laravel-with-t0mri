import {
    Card,
    CardBody,
    CardFooter,
    CardHeader,
    Image,
} from "@nextui-org/react";

export default ({ auth, post }: any) => {
    return (
        <>
            <Card className="m-4">
                <CardHeader className="flex gap-3">
                    <Image
                        alt="nextui logo"
                        height={40}
                        radius="full"
                        src="/assets/icon-b-bg-x-mas.png"
                        width={40}
                    />
                    <div className="flex flex-col">
                        <p className="text-md">{auth.user.name}</p>
                        <p className="text-small text-default-500">
                            {auth.user.organization}
                        </p>
                    </div>
                </CardHeader>
                <CardBody className="font-bold">
                    <p>{post.title}</p>
                </CardBody>
                <CardFooter>
                    <p>{post.body}</p>
                </CardFooter>
            </Card>
        </>
    );
};
